<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/3
 * Time: 15:27
 */

$server = new swoole_server("0.0.0.0",2346,SWOOLE_PROCESS,SWOOLE_SOCK_UDP);

$server->on("connect",function(swoole_server $server,$fd,$reactorid){
    echo "connect".PHP_EOL;
});
$server->on("packet",function(swoole_server $server,$data,$clientinfo){
    print_r($clientinfo);
    echo "Data:".$data.PHP_EOL;
    //$server->send($clientinfo[''])

    $server->sendto($clientinfo['address'],$clientinfo['port'],$data);
});
$server->on("close",function(swoole_server $server){
    echo "close".PHP_EOL;
});

$server->start();