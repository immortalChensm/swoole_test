<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/27
 * Time: 17:03
 */

//$server = new swoole_server("0.0.0.0",9501);
//$server = new swoole_server("0.0.0.0",9501,2,1|512);
$server = new swoole_server("0.0.0.0",9501,SWOOLE_PROCESS,SWOOLE_SOCK_TCP|SWOOLE_SSL);
//$server->addlistener("127.0.0.1",2345,SWOOLE_SOCK_TCP);
//$server->addlistener("/home/sw4.4/mysocket.sock",0,SWOOLE_UNIX_STREAM);
//$server->addlistener("127.0.0.1",2345,SWOOLE_SOCK_TCP | SWOOLE_SSL);
$server->set([
    'ssl_key_file'=>'/home/sw4.4/code/ssl/sw4.4.key',
    'ssl_cert_file'=>'/home/sw4.4/code/ssl/sw4.4.crt',
]);
$server->on("start",function (swoole_server $server){
    echo "swoole start".$server->master_pid.PHP_EOL;
});

$server->on("receive",function (swoole_server $server,$fd,$reactorId,$data){

    echo $data.PHP_EOL;
    $server->send($fd,$data);
});

$server->on("close",function (swoole_server $server,$fd,$reactorId){

    echo "fd[".$fd.'] is closed'.PHP_EOL;
});
$server->start();