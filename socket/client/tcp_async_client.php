<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 17:21
 */

$client = new swoole_client(SWOOLE_SOCK_TCP,SWOOLE_SOCK_ASYNC);

$client->on("connect",function(swoole_client $client){
    //$client->send("你好啊，老铁");
    $client->enableSSL(function ($client){
        $client->send("hi");
    });
    echo '已成功连接服务器'.PHP_EOL;
});

$client->on("receive",function (swoole_client $client,$data){

    print_r($data);
    
    echo '收到服务器端返回的数据是：'.$data.PHP_EOL;
});

$client->on("error",function(swoole_client $client){
    echo "连接出错了";
});

$client->on("close",function(swoole_client $client){
    echo "客户端已经关闭了";
});

$client->connect("127.0.0.1",2346);