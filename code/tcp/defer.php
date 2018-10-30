<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/27
 * Time: 20:04
 */

echo 1;
echo PHP_EOL;
echo 2;
echo PHP_EOL;
$server = new swoole_server("0.0.0.0",9501);
$server->on("receive",function (swoole_server $server,$fd,$reactorId,$data){
    echo "world".PHP_EOL;
    $server->defer(function (){
        echo "wait a for seconds run me".PHP_EOL;
    });

    echo "hi".PHP_EOL;
});

$server->start();

ECHO 3;