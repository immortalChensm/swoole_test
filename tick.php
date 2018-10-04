<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/3
 * Time: 11:31
 */

$server = new swoole_server("0.0.0.0",2346);

$server->on("receive",function(swoole_server $server,$fd,$reactorId,$data){

    echo "data:".$data.PHP_EOL;
    if(trim($data) == 'time'){
//        $server->tick(2,function()use($data,$server,$fd){
//            $server->send($fd,$data.time());
//        });
        $param = [$server,$fd];
        $server->tick(3,function ($param){
           $param[0]->send($param[1],date("Ymdhis"));
        },$param);
    }
});
$server->start();