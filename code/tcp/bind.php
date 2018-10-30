<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/27
 * Time: 23:06
 */

$server = new swoole_server("0.0.0.0",9501);

$server->fdList = [];

$server->set(['worker_num'=>5,'dispatch_mode'=>5]);

$server->on("receive",function(swoole_server $server,$fd,$reactorId,$data){

    $conn = $server->connection_info($fd);
    print_r($conn);
    if (empty($conn['uid'])){
        $uid = $fd+1;
        $server->bind($fd,$uid);
        $server->send($fd,"绑定id成功，你的uid=".$uid);
    }else{
        if (empty($server->fdList[$fd])){
            $server->fdList[$fd] = $conn['uid'];
        }
        print_r($server->fdList);
        foreach($server->fdList as $fd=>$uid){
            $server->send($fd,"fd=".$fd."of uid=".$uid."say:".$data);
        }
    }
});

$server->on("close",function(swoole_server $server,$fd,$reactorId){
    if ($server->fdList[$fd]){
        unset($server->fdList[$fd]);
    }
});

$server->start();
