<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/31
 * Time: 20:53
 */

$pool = new Swoole\Process\Pool(2,SWOOLE_IPC_SOCKET);

$pool->on("message",function (Swoole\Process\Pool $pool,$msg){

    echo $msg.PHP_EOL;
    $pool->write("hello:".$msg);
});

$pool->listen("127.0.0.1",2346);

$pool->start();