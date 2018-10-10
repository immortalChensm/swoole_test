<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/18
 * Time: 21:00
 */


echo "主进程开始".PHP_EOL;
$process = new swoole_process(function(swoole_process $process){

    echo "子进程开始".$process->pid.PHP_EOL;
    for($i=0;$i<10;$i++){
        echo $process->read().PHP_EOL;
    }

    echo "子进程结束".PHP_EOL;
},false);
for($i=0;$i<10;$i++){
    echo $i.PHP_EOL;
    $process->write($i);

}
$pid = $process->start();
echo $pid.PHP_EOL;



echo "主进程结束".PHP_EOL;

swoole_process::wait();