<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/4
 * Time: 17:28
 */

echo "写入文件".PHP_EOL;

Co::create(function(){
    echo Co::getuid().PHP_EOL;

    Co::writeFile("writeFile.log","hellow,world");

});

echo "写入结束".PHP_EOL;