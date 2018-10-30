<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/27
 * Time: 15:41
 */

$sever = new swoole_server("0.0.0.0",9501);

$sever->set([
    'dispatch_mode'=>7,
    'worker_num'=>2
]);
$sever->on("start",function (swoole_server $server){
    echo "master_id:".$server->master_pid.PHP_EOL;
    echo "worker_num:".$server->setting['worker_num'].PHP_EOL;
});
$sever->on("receive",function(swoole_server $server,$fd,$reactorId,$data){
    echo "fd:".$fd.PHP_EOL;
    echo "reactorId:".$reactorId.PHP_EOL;
    echo "data:".$data.PHP_EOL;
    echo "worker_id:".$server->worker_id.PHP_EOL;
    $server->send($fd,$data);
});
$sever->start();