<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/19
 * Time: 12:10
 */

$worker_num = 2;
$worker = [];

for($i=0;$i<$worker_num;$i++){
    $process = new swoole_process("callback",false,false);
    $process->useQueue();
    $pid = $process->start();
    $worker[$pid] = $process;
}

function callback(swoole_process $process){
    echo $process->pop().PHP_EOL;
    sleep(2);
    $process->exit(0);
}

foreach($worker as $pid=>$process){
    $process->push("hello,swoole[$pid]");
}

for($i=0;$i<$worker_num;$i++){
    $ret = swoole_process::wait();
    unset($worker[$ret['pid']]);
    echo "进程".$ret['pid']."结束";
}

