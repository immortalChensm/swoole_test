<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/24
 * Time: 14:43
 */

$worker_num = 2;
$process_pool = [];


$queue_key = "1";
$mode = 2 | swoole_process::IPC_NOWAIT;

function sub_process(swoole_process $worker)
{
    sleep(1);
    echo '子进程'.$worker->pid.'启动'.PHP_EOL;
    while($msg = $worker->pop()){
        if($msg){
            $sub_pid = $worker->pid;
            echo 'sub_process:'.$sub_pid." msg is:".$msg.PHP_EOL;
        }else{
            break;
        }

    }

    echo '子进程'.$worker->pid."结束".PHP_EOL;
    $worker->exit(1);
}

for($i=0;$i<$worker_num;$i++){

    $process = new swoole_process('sub_process');
    $process->useQueue($queue_key,$mode);
    $process->start();
    $pid = $process->pid;
    $process_pool[$pid] = $process;
}

$message = [
    "hello,bibi",
    "hello,tony",
    "hello,jack",
    "hello,tom"
];

$process = current($process_pool);
foreach ($message as $msg){
    $process->push($msg);
}


swoole_process::wait();
//swoole_process::wait();
