<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/16
 * Time: 20:05
 */

Co::create(function(){

    $file = "./writefile.log";
    Co::writeFile($file,"hello,bros");

    $con = Co::readFile($file);
    echo $con;
});