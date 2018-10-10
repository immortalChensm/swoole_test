<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/16
 * Time: 19:47
 */

echo "先执行我".PHP_EOL;
$file = fopen("coroutine1.php","r");
//$id = Swoole\Coroutine::create(function ()use($file){
//
//    fseek($file,10);
//    $content = Co::fread($file);
//    echo $content.PHP_EOL;
//
//});

$id = Co::create(function ()use($file){

    fseek($file,60);
    //$content = Co::fread($file);

    $content = Co::fgets($file);
    echo $content.PHP_EOL;

});

echo "协程id:".$id.PHP_EOL;
echo "运行结束".PHP_EOL;