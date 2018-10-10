<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/26
 * Time: 16:20
 */

$client = new swoole_client(SWOOLE_SOCK_TCP, SWOOLE_SOCK_ASYNC);
$client->on("connect", function(swoole_client $cli) {
    $cli->send("hello,swoole");
});
$client->on("receive", function(swoole_client $cli, $data){
    echo "Receive: $data";
    //$cli->send(str_repeat('A', 100)."\n");
    //sleep(10);
});
$client->on("error", function(swoole_client $cli){
    echo "error\n";
});
$client->on("close", function(swoole_client $cli){
    echo "Connection close\n";
});
$client->connect('127.0.0.1', 8888);

while(1){
    $data = fgets(STDIN);
    if($data){
        $client->send($data);
    }
}

