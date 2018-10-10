<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/14
 * Time: 17:54
 */

$serv = new swoole_server("0.0.0.0",9501,SWOOLE_PROCESS,SWOOLE_SOCK_TCP);

$serv->set([
    "worker_num"=>3,
]);
$serv->on("start",function(swoole_server $serv){
    echo 'server start!'.PHP_EOL;
});

$serv->on("connect",function(swoole_server $serv,$fd,$reactorId){

});

$serv->on("PipeMessage",function(swoole_server $serv,$src_workerid,$msg){
    //echo "receive from workerid:".$serv.PHP_EOL;
    //echo 'receive from data:'.$msg.PHP_EOL;
    print_r($src_workerid);
    print_r($msg);
});
$serv->on("receive",function(swoole_server $serv,$fd,$reactorId,$data){

//    if($serv->exist($fd)){
//        $serv->send($fd,$data.'==='.date("Ymdhis"));
//    }

    $serv->send($fd,$data.'==='.date("Ymdhis"));
    //$serv->sendMessage("hello",1);
    foreach(range(0,$serv->setting['worker_num']) as $workerid){
        if($workerid!=$serv->worker_id){
            $serv->sendMessage('hi',$workerid);
        }

    }

});

$serv->on("close",function(swoole_server $serv,$fd,$reactorid){

});

$serv->start();