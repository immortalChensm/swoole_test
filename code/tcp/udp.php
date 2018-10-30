<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/27
 * Time: 21:28
 */
$server = new swoole_server("0.0.0.0",9501,SWOOLE_PROCESS,SWOOLE_SOCK_UDP);

$server->on("packet",function(swoole_server $server,$data,$client){
    print_r($data);
    print_r($client);
    $server->sendto($client['address'],$client['port'],$data);
});

$server->start();