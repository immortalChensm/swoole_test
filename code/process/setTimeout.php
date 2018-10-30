<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/29
 * Time: 22:37
 */

$process = new swoole_process(function (swoole_process $process){

    $process->name("php test");
    sleep(5);
    $process->write('hi,swoole');
},true);
$process->setTimeout(1);
$process->start();

echo $process->read();

swoole_process::wait();