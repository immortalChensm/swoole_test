<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/18
 * Time: 20:24
 */
echo "run main process".PHP_EOL;
$process = new swoole_process(function(swoole_process $process){
    $ret = $process->exec("/usr/bin/ls",[]);
    print_r($ret);
});

$pid =$process->start();

echo "child processid is :".$pid.PHP_EOL;

echo "main processid is:".posix_getpid().PHP_EOL;

swoole_process::wait();
