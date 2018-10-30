<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/27
 * Time: 17:13
 */

//$client = new swoole_client(SWOOLE_UNIX_STREAM);
//$client = new swoole_client(1|512);
$client = new swoole_client(SWOOLE_SOCK_TCP|SWOOLE_SSL);
//$client->connect("/home/sw4.4/mysocket.sock")
if(!$client->connect("127.0.0.1",9501)){
    echo error_get_last();
}

$client->send("hi,i am client1");
echo $client->recv(8192);
$client->close();