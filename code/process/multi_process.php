<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/29
 * Time: 22:58
 */

$num = 2;

$pool = [];

$pid = posix_getpid();
function sub_process(swoole_process $process){

    echo "workerid=".$process->pid.PHP_EOL;
    while($msg = $process->pop()){
        if ($msg == false){
            break;
        }
        $pid = $process->pid;
        //echo $pid.PHP_EOL;
        echo "sub_proces[".$pid.']'.$msg.PHP_EOL;
        sleep(1);
    }

    $process->exit(0);
}

$customKey = 1;
$mode = 2 | swoole_process::IPC_NOWAIT;

for($i=0;$i<$num;$i++){

    $worker = new swoole_process('sub_process');
    $worker->useQueue($customKey,$mode);
    $pid = $worker->start();
    $pool[$worker->pid] = $worker;
}

$Message = [
    'chinese',
    'america',
    'japanese'
];

$worker = current($pool);
foreach($Message as $item){
    $worker->push($item);
}

echo $pid.PHP_EOL;
swoole_process::wait();
swoole_process::wait();