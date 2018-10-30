<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/29
 * Time: 22:09
 */
echo posix_getpid().PHP_EOL;

$process = new swoole_process(function (swoole_process $process){
    echo 1;
});

$process->start();

$process = new swoole_process(function (swoole_process $process){
    echo 2;
});

$process->start();

while(1){}