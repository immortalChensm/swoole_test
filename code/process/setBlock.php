<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/29
 * Time: 22:48
 */

$process = new swoole_process(function (swoole_process $process){

    $process->setBlocking(false);

    $process->write("hi,swoole");
},true);
$process->start();
echo $process->read();