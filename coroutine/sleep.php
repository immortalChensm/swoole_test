<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/4
 * Time: 17:16
 */

echo "睡眠开始".PHP_EOL;

Co::create(function(){

    echo "协程调度器".PHP_EOL;
    Co::sleep(5);

    echo Co::getuid().PHP_EOL;
});

echo "结束".PHP_EOL;