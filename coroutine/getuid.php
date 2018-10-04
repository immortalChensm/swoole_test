<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/4
 * Time: 16:52
 */

echo "1".PHP_EOL;

go(function(){
    echo "20".PHP_EOL;

    echo Co::getuid().PHP_EOL;
});

go(function(){
    echo "21".PHP_EOL;

    echo Co::getuid().PHP_EOL;
});

go(function(){
    echo "22".PHP_EOL;

    echo Co::getuid().PHP_EOL;
});

echo Co::getuid().PHP_EOL;

echo "3".PHP_EOL;