<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/26
 * Time: 21:49
 */

$server = new swoole_server("0.0.0.0",2345,SWOOLE_PROCESS,SWOOLE_SOCK_TCP);

$server->on("start",function (swoole_server $server){
    echo 'start...'.$server->master_pid;
});

$server->on("receive",function (swoole_server $server,$fd,$reactorId,$data){
    echo 'data:'.$data.PHP_EOL;
    $server->send($fd,$data);
});

$server->on("close",function(swoole_server $server,$fd){
    echo 'close';
});
$server->start();