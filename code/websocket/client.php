<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/29
 * Time: 21:47
 */

$client = new swoole_http_client("127.0.0.1",2346);

$client->on("message",function (swoole_http_client $client,$frame){
    var_dump($frame);
});

$client->upgrade("/",function (swoole_http_client $client){

    $client->push('hi');
    echo $client->body;

    $client->push('hi');
    $client->push('hi');
    $client->push('hi');
});



