<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/1
 * Time: 17:32
 */

for($i=0;$i<10;$i++){
    $client = new swoole_client(SWOOLE_TCP);

    $client->connect("127.0.0.1",2346,-1);

    $client->send("nihao,swoole");

    echo $client->recv();

    $client->close();
}


