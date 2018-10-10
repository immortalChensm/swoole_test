<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/1
 * Time: 20:38
 */

$server = new swoole_server("0.0.0.0",2346);

$server->on("connect",function (swoole_server $swoole_server,$fd,$reactorid){
    echo "有个请求连接过来了，它的fd是：".$fd.PHP_EOL;
});

$server->on("receive",function (swoole_server $swoole_server,$fd,$reactorid,$data){
    echo "有个请求连接发送了数据，数据是：".$data.PHP_EOL;
});

$server->on("close",function (swoole_server $swoole_server,$fd,$reactorid){
    echo "有个客户端关闭了连接".PHP_EOL;
});

$server->start();