<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/4
 * Time: 16:43
 */

echo "1".PHP_EOL;
Swoole\Coroutine::create(function(){
    echo "2".PHP_EOL;
});

echo "3".PHP_EOL;