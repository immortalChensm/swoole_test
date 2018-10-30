<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/28
 * Time: 14:26
 */

echo 1;
echo PHP_EOL;

$uid = Swoole\Coroutine::create(function (){
    echo 2;
});

echo $uid;

$uid = Swoole\Coroutine::create(function (){
    echo 21;
});

echo $uid;