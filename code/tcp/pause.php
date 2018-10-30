<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/27
 * Time: 22:26
 */

$server = new swoole_server("0.0.0.0",9501);

$server->on("receive",function(swoole_server $server,$fd,$reactorId,$data){
    echo "data:".$data.PHP_EOL;
    if (trim($data) == 'pause'){
        $server->pause($fd);

        $server->after(5000,function ()use($server,$fd){
            $server->resume($fd);
            $server->send($fd,"开始接受数据");
        });
    }
    $server->send($fd,$data);
});

$server->start();