<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/18
 * Time: 19:40
 */
echo "main process".PHP_EOL;
$process = new swoole_process(function(swoole_process $process){


        $process->write(date("Ymdhis"));

},true);

$process->name("php:jackcsm");

//该方法会一直监听该文件描述符是否存在可读写状态，导致子进程结束时，父进程一直不结束
swoole_event_add($process->pipe,function($pipe)use($process){
    echo $process->read();
});

$pid = $process->start();
//echo $process->read().PHP_EOL;
echo $pid.PHP_EOL;

$ret = swoole_process::wait();
print_r($ret);

echo posix_getpid().PHP_EOL;