<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/16
 * Time: 20:04
 */


go(function(){

    $file = "./co_write.log";
    $content = Co::readFile($file);
    echo $content;
});