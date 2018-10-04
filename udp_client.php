<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/3
 * Time: 15:35
 */

$client = new swoole_client(SWOOLE_SOCK_UDP);

$client->connect("127.0.0.1",2346);

$client->send("hi,udp server");

echo $client->recv(8192);

$client->send("hi,udp dede");

print_r($client->getpeername());

print_r($client->getPeerCert());

