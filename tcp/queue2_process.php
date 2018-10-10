<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/24
 * Time: 15:10
 */

$worker_num = 2;

$process_pool = [];

function run(swoole_process $process){
    echo '子进程'.$process->pid."启动".PHP_EOL;
    while($msg=$process->pop()){
        //$msg = $process->pop();
        echo '来自进程的数据是:'.$msg;
    }
    sleep(2);
    echo '子进程'.$process->pid."结束".PHP_EOL;
    $process->exit(0);
}
for($i=0;$i<$worker_num;$i++){
    $process = new swoole_process('run',false,false);
    $process->useQueue();
    $process->start();
    $pid = $process->pid;

    $process_pool[$pid] = $process;
}

while(true){

    $pid = array_rand($process_pool);
    $process = $process_pool[$pid];

    $process->push(date("Ymdhis"));
}


for($i=0;$i<$worker_num;$i++){

    //返回已经退出的子进程
    $ret = swoole_process::wait();
    $pid = $ret['pid'];
    $process = $process_pool[$pid];
    unset($process_pool[$pid]);
    echo '子进程'.$process->pid."结束".PHP_EOL;
}
