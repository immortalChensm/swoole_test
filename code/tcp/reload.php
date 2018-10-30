<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/27
 * Time: 18:45
 */

$server = new swoole_server("0.0.0.0",9501);

$server->on("receive",function (swoole_server $server,$fd,$reactorId,$data){

    echo $data.PHP_EOL;
    if (trim($data) == 'reload'){
        $server->reload();
    }
});

$server->on("workerStart",function (swoole_server $server,$workerid){
    print_r(get_included_files());
    echo "worker_id:".$workerid.PHP_EOL;
});

$server->on("workerStop",function(swoole_server $server,$workerid){
    echo "worker_id:".$workerid."stop".PHP_EOL;
});

$server->on("close",function(swoole_server $server,$fd,$reactorId){
    echo 'fd['.$fd.'] is closed';
});

$server->start();