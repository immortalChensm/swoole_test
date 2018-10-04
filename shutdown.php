<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/3
 * Time: 11:16
 */

echo "主进程启动".posix_getpid().PHP_EOL;

$server = new swoole_server("0.0.0.0",2346);

$server->on("receive",function (swoole_server $server,$fd,$reactorId,$data){
    if(trim($data) == 'shutdown'){
        echo "the server will be shut".PHP_EOL;
        $server->shutdown();
    }
});

$server->start();

echo "swoole_server start".PHP_EOL;