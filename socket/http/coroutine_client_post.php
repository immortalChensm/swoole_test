<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/16
 * Time: 20:36
 */
echo "1".PHP_EOL;
Co::create(function(){
    $client = new Swoole\Coroutine\Http\Client("127.0.0.1",2346);

    $client->setHeaders([
        "User-Agent"=>'coroutine-client',
        "Host"=>"127.0.0.1"
    ]);

    $client->post("/",['name'=>'jackcsm']);

    print_r($client->headers);
    print_r($client->body);

    $client->close();
});

echo "2".PHP_EOL;