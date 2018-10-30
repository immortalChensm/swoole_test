<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/29
 * Time: 20:12
 */

swoole_coroutine::create(function(){

    $client = new Swoole\Coroutine\Http\Client("127.0.0.1",2346);

//    $client->get("/api/tests");
//
//    echo $client->statusCode;
//    echo $client->body;

    //$client->addFile("./client.php",'tom');
    //$client->addData("hello",'jack');


    //$client->post("/api/test",['age'=>100]);
    $redis = new Swoole\Coroutine\Redis();
    $redis->connect("127.0.0.1",6379);
    $keys = $redis->keys("*");
    $client->post("/api/test",['key'=>$keys]);
    echo $client->body;

    echo $client->body;

});