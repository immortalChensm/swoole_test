<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/29
 * Time: 22:21
 */
echo posix_getpid().PHP_EOL;
$process = new swoole_process(function (swoole_process $process){

    $process->exec("/usr/bin/ls",[]);

});
$process->name("php 进程管理");

$pid = $process->start();
print_r($pid);

//swoole_process::wait();
while(1){}
echo "end";