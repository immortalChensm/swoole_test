<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/27
 * Time: 22:49
 */

$server = new swoole_server("0.0.0.0",9501);

$server->on("receive",function(swoole_server $server,$fd,$reactorId,$data){

    echo "data".$data.PHP_EOL;
    print_r($server->getClientInfo($fd));
    //echo $server->getReceivedTime();
    $server->send($fd,json_encode($server->connection_info($fd)));
});

$server->start();