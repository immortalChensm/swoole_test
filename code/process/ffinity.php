<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/30
 * Time: 22:26
 */

echo "master[".posix_getpid().']'.PHP_EOL;

//echo swoole_cpu_num().PHP_EOL;
//指定进程绑定到具体的cpu执行
swoole_process::setaffinity([swoole_cpu_num()-1]);

$process = new swoole_process(function(swoole_process $process){
    $process->write("hi,swoole");
},true);

$process->start();
echo $process->read().PHP_EOL;

swoole_process::wait();