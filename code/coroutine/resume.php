<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/28
 * Time: 14:30
 */

$id = go(function(){

    $uid = Swoole\Coroutine::getuid();

    echo 1;
    echo PHP_EOL;
    \Swoole\Coroutine::suspend();
    echo 2;
    swoole_coroutine::suspend();
    echo 3;
});

echo 4;
swoole_coroutine::resume($id);
echo 5;
swoole_coroutine::resume($id);