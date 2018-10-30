<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/27
 * Time: 18:35
 */

$server = new swoole_server("0.0.0.0",9501,SWOOLE_PROCESS,SWOOLE_SOCK_TCP);
$server->listen("127.0.0.1",2345,SWOOLE_SOCK_TCP);
$process = new swoole_process(function (swoole_process $process)use($server){
    while (1){
        $data = $process->read();
        if ($data){
            foreach ($server->connections as $connection){
                $server->send($connection,$data);
            }
        }
    }
});
$server->addProcess($process);
$server->set([
    'reactor_num'=>4,
    'worker_num'=>4
]);

$server->on("receive",function (swoole_server $server,$fd,$reactorId,$data)use($process){

    $process->write($data);
});
$server->start();