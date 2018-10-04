<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/4
 * Time: 17:08
 */

echo "开始读取文件".PHP_EOL;

$fp = fopen("../heart.php","r");

Co::create(function()use($fp){
    echo Co::getuid().PHP_EOL;
    $data = Co::fread($fp);
    print_r($data);

});

Co::create(function()use($fp){
    echo Co::getuid().PHP_EOL;
    $data = Co::fread($fp);
    print_r($data);

});


Co::create(function()use($fp){
    echo Co::getuid().PHP_EOL;
    $data = Co::fgets($fp);
    print_r($data);

});

echo "文件读取结束".PHP_EOL;