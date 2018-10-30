<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/27
 * Time: 22:14
 */

$server = new swoole_server("0.0.0.0",9501);

$server->set(['worker_num'=>5]);

$server->on("pipemessage",function (swoole_server $server,$workerid,$message){
    list($data,$fd) = explode("-",$message);
    echo "src_workerid=".$workerid.PHP_EOL;
    $server->send($fd,$data.'发送的workerid='.$server->worker_id);
});
$server->on("receive",function(swoole_server $server,$fd,$reactroId,$data){
    echo "data:".$data.PHP_EOL;
    echo "接受的workerid:".$server->worker_id.PHP_EOL;
    $dest_workerid = rand(0,4);
    if ($dest_workerid!=$server->worker_id) {
        $server->sendMessage($data.'-'.$fd, $dest_workerid);
    }
});

$server->start();