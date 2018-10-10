<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/18
 * Time: 17:33
 */

$server = new swoole_server("0.0.0.0",2346,SWOOLE_PROCESS,SWOOLE_SOCK_TCP);

$server->set([
    "worker_num"=>2,
    "reactor_num"=>2,
]);
$server->on("start",function(swoole_server $server){
    echo "tcp server 启动了".PHP_EOL;
});
$server->on("connect",function(swoole_server $server,$fd,$reactorId){
    echo "fd:".$fd."连接了".PHP_EOL;
    echo 'fd:'.$fd."来自：".$reactorId."线程".PHP_EOL;
});

$server->on("receive",function(swoole_server $server,$fd,$reactorId,$data){


    sleep(20);
    echo "fd:".$fd."发消息了".PHP_EOL;
    echo 'fd:'.$fd."来自：".$reactorId."线程".PHP_EOL;
    echo "fd:".$fd."发来的消息是：".$data.PHP_EOL;
    $server->send($fd,date("Ymdhis"));
});

$server->on("close",function(swoole_server $server,$fd,$reactorid){
    echo "fd:".$fd."关闭了了".PHP_EOL;
    echo 'fd:'.$fd."来自：".$reactorid."线程".PHP_EOL;
});

$server->start();