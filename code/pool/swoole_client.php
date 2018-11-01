<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/31
 * Time: 21:06
 */

$client = new swoole_client(SWOOLE_SOCK_TCP);

$data = json_encode(['msg'=>'hello']);
$client->connect("127.0.0.1",2346);
$client->send(pack("N",strlen($data)).$data);
echo $client->recv();
print_r($client->getsockname());

$client->close();