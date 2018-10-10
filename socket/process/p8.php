<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/19
 * Time: 11:42
 */

echo "主进程启动：".posix_getpid().PHP_EOL;

$p1 = new swoole_process(function(swoole_process $process){
    echo "子进程1启动".$process->pid.PHP_EOL;
    echo "我是子进程1".PHP_EOL;
    echo date("Y-m-d H:i:s").PHP_EOL;
    sleep(3);
    echo date("Y-m-d H:i:s").PHP_EOL;
    echo "子进程1结束".$process->pid.PHP_EOL;
});
$p1->setBlocking(false);

$p2 = new swoole_process(function(swoole_process $process){
    echo "子进程2启动".$process->pid.PHP_EOL;
    echo "我是子进程2".PHP_EOL;
    echo date("Y-m-d H:i:s").PHP_EOL;
    echo "子进程2结束".$process->pid.PHP_EOL;
});
$p1->setBlocking(false);
$p1_pid = $p1->start();
$p2_pid = $p2->start();
echo "进程p1：".$p1_pid.PHP_EOL;
echo "进程p2:".$p2_pid.PHP_EOL;

$ret1 = swoole_process::wait();
$ret2 = swoole_process::wait();
print_r($ret1);
print_r($ret2);

sleep(5);

echo "主进程结束".PHP_EOL;