<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/18
 * Time: 12:18
 */

$process = new Swoole\Process('callback',true);

function callback(swoole_process $process){

    $ret = $process->exec("/home/soft/php/bin/php",["/home/itkucode/sw/socket/websocket/server.php"]);
    $process->write('服务器启动成功');
}

$pid = $process->start();
$result = $process->read();
print_r($result);
$ret = Swoole\Process::wait();
print_r($ret);