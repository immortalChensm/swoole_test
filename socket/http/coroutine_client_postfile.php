<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/16
 * Time: 20:42
 */
go(function(){


    $client = new Swoole\Coroutine\Http\Client("127.0.0.1",2346);

    $client->setHeaders([
        "User-Agent"=>"jackcsm"
    ]);

    $client->addFile("./client.php","php","text/plain");

    $client->post("/",['a'=>'b']);

    echo $client->body;

    $client->close();
});