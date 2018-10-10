<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/16
 * Time: 20:29
 */

go(function(){
    $client = new Swoole\Coroutine\Http\Client("127.0.0.1",2346);

    $client->set(['timeout'=>0.5]);

    $client->setHeaders([
        'User-Agent'=>'coroutine-client'
    ]);

    $client->get("/");

    print_r($client->body);

    $client->close();
});