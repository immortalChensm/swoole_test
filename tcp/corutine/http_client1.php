<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/27
 * Time: 13:50
 */


//http协程客户端
$cli = new Swoole\Coroutine\Http\Client('127.0.0.1', 80);
$cli->setHeaders([
    'Host' => "localhost",
    "User-Agent" => 'Chrome/49.0.2587.3',
    'Accept' => 'text/html,application/xhtml+xml,application/xml',
    'Accept-Encoding' => 'gzip',
]);
$cli->set([ 'timeout' => 1]);
$cli->get('/');
echo $cli->body;
$cli->close();