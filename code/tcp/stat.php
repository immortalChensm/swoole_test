<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/27
 * Time: 23:17
 */

$server = new swoole_server("0.0.0.0",9501);

$server->on("receive",function(swoole_server $server,$fd,$reactorid,$data){
    echo "data".$data.PHP_EOL;
    print_r($server->stats());
    $server->send($fd,$data);
});
$server->start();