<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 19:59
 */

$client = new swoole_http_client("127.0.0.1",2346);

$client->setHeaders(['User-Agent'=>'swoole']);

$client->download("/index.html",__DIR__."/index.html",function (swoole_http_client $client){
    var_dump($client->downloadFile);
});
