<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 20:59
 */

$client = new swoole_http_client("127.0.0.1",2346);

$client->setHeaders(['Content-type'=>'text/html']);

$client->get("/",function (swoole_http_client $client){
    print_r($client->headers);
    print_r($client->body);
    print_r($client->statusCode);
    print_r($client->cookies);
    print_r($client->host);
    print_r($client->port);
});