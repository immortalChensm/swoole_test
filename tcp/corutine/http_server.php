<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/27
 * Time: 13:41
 */

$http = new swoole_http_server("127.0.0.1", 8501);

$http->on('request', function ($request, $response) {
    $response->end("<h1>Hello Swoole. #".rand(1000, 9999)."</h1>");
});
$http->start();