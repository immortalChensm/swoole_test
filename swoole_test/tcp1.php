<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/1
 * Time: 20:17
 */

$server = new swoole_server("0.0.0.0",2346,SWOOLE_PROCESS,SWOOLE_TCP);

$server->on("connect",function (swoole_server $server,$fd,$reactorid){
    echo "fd:".$fd.PHP_EOL;
});

$server->on("receive",function (swoole_server $server,$fd,$reactorid,$data){
    echo "fd:".$data.PHP_EOL;
    $server->send($fd,$data);
});

$server->on("close",function (swoole_server $server,$fd,$reactorid){
    echo "close";
});

$server->start();