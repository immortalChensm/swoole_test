<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/28
 * Time: 14:38
 */

echo "准备写入文件";
$file = fopen("./write.txt","wb");
go(function()use($file){

    echo swoole_coroutine::fwrite($file,file_get_contents("http://www.baidu.com"));
});

echo "写入完成";