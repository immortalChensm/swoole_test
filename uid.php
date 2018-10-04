<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/3
 * Time: 12:11
 */

$server = new swoole_server("0.0.0.0",2346);
$server->set([
    'dispatch_mode'=>5
]);
$server->fdList = [];
$server->on("receive",function(swoole_server $server,$fd,$reactorId,$data){
    echo "data:".$data.PHP_EOL;

    print_r($server->connection_info($fd));
    $info = $server->connection_info($fd);
    if(empty($info['uid'])){
        $uid = $fd+1;
        $server->bind($fd,$uid);
        $server->send($fd,"your uid is:".$uid);
    }else{
        if (empty($server->fdList[$fd])){
            $server->fdList[$fd] = $info['uid'];
        }

        print_r($info);
        foreach($server->fdList as $_fd=>$uid){
            $server->send($_fd,"uid:".$uid."说:".$data.PHP_EOL);
        }
    }
});

$server->start();