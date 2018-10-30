<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/28
 * Time: 14:50
 */

echo "读取文件";

echo go(function (){

    echo Swoole\Coroutine::readFile("read.php");
});

echo "end";