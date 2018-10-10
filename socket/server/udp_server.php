<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 14:56
 */

$serv = new swoole_server("0.0.0.0",2346,SWOOLE_PROCESS,SWOOLE_SOCK_UDP);
$serv->set([
    "worker_num"=>5,
]);
$serv->on("start",function(swoole_server $serv){
    echo 'udp server is start';
});

$serv->on("packet",function (swoole_server $serv,$data,$clientinfo){
    print_r($data);
    print_r($clientinfo);

    $serv->sendto($clientinfo['address'],$clientinfo['port'],$data);

    if(trim($data)=='close'){
        $serv->shutdown();
    }
});
$serv->start();