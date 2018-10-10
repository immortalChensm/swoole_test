<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/19
 * Time: 11:28
 */

echo "主进程启动".posix_getpid().PHP_EOL;

$process = new swoole_process(function(swoole_process $process){
    echo "子进程启动".$process->pid.PHP_EOL;
    sleep(3);
    $process->write("hi");
},true);


$process->setTimeout(0.5);


$process->start();
$ret = $process->read();
print_r($ret);
swoole_process::wait();
echo "主进程结束".PHP_EOL;