<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/16
 * Time: 19:56
 */

$file = fopen("./co_write.log","w");
$id = Co::create(function()use($file){
    Co::fwrite($file,"hello,swoole");
});

//$content = Co::fread($file);
//echo $content;