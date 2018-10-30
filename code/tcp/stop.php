<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/27
 * Time: 18:53
 */

$server = new swoole_server("0.0.0.0",9501);

$server->set([
    'worker_num'=>3
]);

$server->on("start",function (swoole_server $server){
    echo "master start".$server->master_pid.PHP_EOL;
});

$server->on("receive",function (swoole_server $server,$fd,$reactorId,$data){
    echo "data[".$data.']';
    echo "receive workerid:".$server->worker_id.PHP_EOL;
    echo "receive workerpid:".$server->worker_pid.PHP_EOL;
    if (trim($data) == 'stop'){
        $server->stop();
    }
});
$server->on("workerStart",function (swoole_server $server,$workerid){
    echo "workeStart[".$workerid.']'.PHP_EOL;
});

$server->on("workerStop",function(swoole_server $server,$workerid){
    echo "workerStop[".$workerid.']'.PHP_EOL;
});

$server->start();