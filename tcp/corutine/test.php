<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/25
 * Time: 16:09
 */

$http = new swoole_http_server("0.0.0.0", 2346);

$http->on("request", function ($request, $response) {
    $client = new Swoole\Coroutine\Client(SWOOLE_SOCK_TCP);
    $client->connect("127.0.0.1", 8888, 0.5);
    //调用connect将触发协程切换
    $client->send("hello world from swoole");
    //调用recv将触发协程切换
    $ret = $client->recv();
    $response->header("Content-Type", "text/plain");
    $response->end($ret);
    $client->close();
});

$http->start();