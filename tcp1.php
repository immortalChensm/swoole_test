<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/1
 * Time: 15:01
 */

$server = new swoole_server('0.0.0.0',1234,SWOOLE_PROCESS,SWOOLE_TCP);

$server->on("connect",function(swoole_server $server,$fd,$reactorId){
    echo "有个请求连接了".$fd.PHP_EOL;
});

$server->on("receive",function (swoole_server $server,$fd,$reactorId,$data){
    echo "客户端发来的数据是：".$data.PHP_EOL;
});

$server->on("close",function (swoole_server $server,$fd,$reactorId){
    echo "close".PHP_EOL;
});

$server->start();