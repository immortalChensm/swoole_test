<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/30
 * Time: 21:14
 */

$worker_num = 10;
$pool = [];

function callback(swoole_process $process){
    
}
for($i=0;$i<$worker_num;$i++){

    $process = new swoole_process('callback');
    $process->start();
    $pool[$process->pid] = $process;
}