<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 19:48
 */

$serv = new swoole_http_server("0.0.0.0",2346);

$serv->on("request",function (swoole_http_request $request,swoole_http_response $response){
    $response->header("Content-type","text/html;charset=utf8");

//    print_r($request->post);
    print_r($request->server);
//    print_r($request->cookie);

    print_r($request->header);
    print_r($request->post);
    print_r($request->files);
     $response->end("<h2>我是一位有钱人</h2>");
});
$serv->start();