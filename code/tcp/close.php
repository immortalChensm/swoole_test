<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/27
 * Time: 20:15
 */

$server = new swoole_server("0.0.0.0",9501);
$server->set([
    'worker_num'=>3
]);
$server->on("receive",function (swoole_server $server,$fd,$reactorId,$data){
    echo "data[".$data."]".PHP_EOL;
    if (trim($data) == 'close'){
        $server->close($fd);
    }
});
$server->on("close",function (swoole_server $server,$fd,$reactorId){
    echo "workerId[".$server->worker_pid."closed"."fd={$fd}".PHP_EOL;
});

$server->start();