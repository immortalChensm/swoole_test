<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/27
 * Time: 22:59
 */

$server = new swoole_server("0.0.0.0",9501);

$server->on("receive",function(swoole_server $server,$fd,$reactorId,$data){

    echo "data".$data.PHP_EOL;
    foreach($server->getClientList() as $conn){
        $server->send($conn,$data);
    }
});

$server->start();