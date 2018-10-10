<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/25
 * Time: 15:54
 */

$num = 10;

$pid1 = pcntl_fork();
if(!$pid1){
    $num+10;
    echo $num.PHP_EOL;
}

$pid2 = pcntl_fork();
if(!$pid2){
    $num+15;
    echo $num.PHP_EOL;
}

echo $num.PHP_EOL;

echo '主进程结束'.posix_getpid().PHP_EOL;