<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/4
 * Time: 17:12
 */

echo "1".PHP_EOL;
$fp = fopen("fwrites.log","w");
Co::create(function()use($fp){

    Co::fwrite($fp,"hi,以协程方式写入的数据哦");
    echo Co::getuid().PHP_EOL;
});

echo "2".PHP_EOL;