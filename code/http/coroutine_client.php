<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/28
 * Time: 17:16
 */
go(function (){

    $client = new Swoole\Coroutine\Http\Client("118.24.77.117",2346);

    $client->post("/api/users",['a'=>'b']);

    echo $client->body;
});
