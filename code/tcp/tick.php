<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/27
 * Time: 19:18
 */

$server = new swoole_server("0.0.0.0",9501);
$server->on("receive",function (swoole_server $server,$fd,$reactorId,$data){
    if (trim($data) == 'tick'){
        $server->timerid = $server->tick(1000,function ($id)use($server,$fd){
            $server->send($fd,$server->timerid."=".date("YmdHis"));
        });
    }elseif(trim($data) == "cancel"){
        $server->clearTimer($server->timerid);
        $server->send($fd,"定时器取消成功");
    }
    $server->send($fd,$data);
});
$server->start();