<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/28
 * Time: 14:34
 */

echo "准备读取文件";

$file = fopen("./create.php","r");
go(function()use($file){

    //echo swoole_coroutine::fread($file,0);
    echo swoole_coroutine::fgets($file);
});

echo "读取完毕";