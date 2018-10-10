<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/17
 * Time: 16:36
 */

$process = new swoole_process('run',true);



$process->name("查看ip的进程");

function run(swoole_process $worker){

    //$ret = $worker->exec("/usr/bin/curl",["-I http://www.baidu.com"]);
    //$ret = $worker->exec("/usr/sbin/ifconfig",[]);
    $ret = $worker->exec("/usr/bin/vmstat",[]);

    //echo $ret;

    $worker->write($ret);
}

$pid = $process->start();

echo '主进程启动'.PHP_EOL;
echo '子进程id'.PHP_EOL;

echo '子进程返回的数据是：'.$process->read();


swoole_process::wait();

