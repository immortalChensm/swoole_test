<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/18
 * Time: 11:08
 */

$ws = new swoole_http_client("127.0.0.1",2346);

$ws->on("message",function(swoole_http_client $ws,$frame){
    print_r($frame);
});

$ws->upgrade("/",function(swoole_http_client $ws){
    echo $ws->body;
    $pack = swoole_websocket_server::pack("不好，我不是老铁",1);
    //$ws->push("hi,swoole");
    $ws->push($pack);
});