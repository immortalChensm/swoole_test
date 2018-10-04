<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/3
 * Time: 11:46
 */

$server = new swoole_server("0.0.0.0",2346);

$server->on("workerStart",function(swoole_server $server,$workerid){
    $server->timeid = $server->tick(2,function(){
        echo date("Y-m-d H:i:s").PHP_EOL;
    });
});

$server->on("receive",function(swoole_server $server,$fd,$reactorid,$data){
    echo "data:".$data.PHP_EOL;
    if(trim($data) == 'clear'){
        $server->clearTimer($server->timeid);
    }
});

$server->start();