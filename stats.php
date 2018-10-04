<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/3
 * Time: 12:23
 */

$server = new swoole_server("0.0.0.0",2346);

$server->on("receive",function(swoole_server $server,$fd,$reactorid,$data){
    echo "data:".$data.PHP_EOL;
    $server->send($fd,$data);
    if(trim($data) == 'stat'){
        $server->send($fd,json_encode($server->stats()));
        print_r($server->stats());
    }
});

$server->start();