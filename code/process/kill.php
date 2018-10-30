<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/30
 * Time: 21:14
 */

$worker_num = 10;
$pool = [];
$processpid = [];
echo "masterid".posix_getuid().'] start'.PHP_EOL;

function callback(swoole_process $process){
    echo $process->pid.PHP_EOL;
    echo $process->exit(0);
}
for($i=0;$i<$worker_num;$i++){

    $process = new swoole_process('callback');
    $process->start();
    $pool[$process->pid] = $process;
    $processpid[] = $process->pid;
}

sleep(2);

$current = current($pool);
swoole_process::kill(current($processpid),SIGTERM);
