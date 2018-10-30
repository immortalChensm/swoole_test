<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/27
 * Time: 23:32
 */

$server = new swoole_server("0.0.0.0",9501);

$server->set([
    "worker_num"=>2,
    "task_worker_num"=>3
]);

$server->on("receive",function (swoole_server $server,$fd,$reactorId,$data){
    echo "data".$data.PHP_EOL;
    $server->task($data);
});

$server->on("task",function (swoole_server $server,$taskId,$data){
    echo "taskid:".$taskId.PHP_EOL;
    echo "data:".$data.PHP_EOL;
    $server->finish($data);
});

$server->on("finish",function (swoole_server $server,$taskId,$result){
    echo "task taskid={$taskId} finish:".$result.PHP_EOL;
});

$server->start();