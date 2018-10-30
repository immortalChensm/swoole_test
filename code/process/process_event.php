<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/29
 * Time: 22:44
 */

$process = new swoole_process(function (swoole_process $process){

    //$process->write("hi,swoole");
    swoole_event_add($process->pipe,function (){
        echo "can read";
    },function ()use($process){
        echo "can write".PHP_EOL;
        $process->write("hi,swoole");
    });
},true);

$process->start();
echo $process->read();

