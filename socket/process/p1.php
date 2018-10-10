<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/18
 * Time: 12:11
 */

echo "1".PHP_EOL;
$process = new swoole_process('callback',false);

function callback(swoole_process $process){
    echo "3".PHP_EOL;
}

$pid = $process->start();
echo $pid.PHP_EOL;
swoole_process::wait();
echo "2".PHP_EOL;
