<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/2
 * Time: 14:13
 */

$server = new swoole_server("0.0.0.0",2346,SWOOLE_BASE);
$server->set([
    //"worker_num"=>5,
    "reactor_num"=>2,

]);
$server->on("connect",function(swoole_server $server,$fd,$reactorId){

    echo "connect".PHP_EOL;
});

$server->on("receive",function(swoole_server $server,$fd,$reactorId,$data){
    echo $data.PHP_EOL;
    $server->sendwait($fd,$data);
});

$server->on("close",function(swoole_server $server,$fd,$reactorId){
    echo "close".PHP_EOL;
});

$server->start();