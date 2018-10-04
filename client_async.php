<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/3
 * Time: 15:03
 */

echo "1".PHP_EOL;
$client = new swoole_client(SWOOLE_SOCK_TCP,SWOOLE_SOCK_ASYNC);

$client->on("connect",function(swoole_client $client){
    echo "成功连接了服务器".PHP_EOL;
    $client->send("成功连接，发一条消息");

    echo $client->isConnected();

    print_r($client->getsockname());
});

$client->on("receive",function(swoole_client $client,$data){
        echo "data:".$data.PHP_EOL;
});

$client->on("close",function(swoole_client $client){
        echo "关闭了连接".PHP_EOL;
});

$client->on("error",function(swoole_client $client){
       echo "连接错误".PHP_EOL;
});

echo "2".PHP_EOL;
$client->connect("127.0.0.1",2346);

echo "3".PHP_EOL;