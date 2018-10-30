<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/30
 * Time: 22:33
 */

function callback(swoole_process $process){

    //监听进程的管道是否可读，可读时回调运行
    swoole_event_add($process->pipe,function ($pipe)use($process){
        echo $process->read().PHP_EOL;

        swoole_process::kill(posix_getpid(),SIGKILL);
    });
}

$process = new swoole_process('callback',false);
$process->start();
$process->write("hi,swoole");

swoole_process::wait();