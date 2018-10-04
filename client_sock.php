<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/2
 * Time: 15:23
 */

$client = new swoole_client(SWOOLE_UNIX_STREAM);

$client->connect("/home/itkucode/sw/swoole/socket.sock",0);

$client->send("hi,sock");

echo $client->recv(8192);