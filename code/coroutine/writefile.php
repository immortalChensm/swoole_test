<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/28
 * Time: 14:55
 */

echo "写入文件";

go(function (){

    echo swoole_coroutine::writeFile("writefile.log","hello,world");
});

go(function (){
    echo swoole_coroutine::readFile("writefile.log");
});

echo "end";