<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/7
 * Time: 12:18
 */

go(function(){

    $sock = new Swoole\Coroutine\Socket(AF_INET,SOCK_STREAM,IPPROTO_IP);

    $sock->connect("127.0.0.1",9603);

    $sock->send("hi,bros");

    $data = $sock->recv();
    print_r($data);

    $sock->close();
});