<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/14
 * Time: 17:54
 */

$serv = new swoole_server("0.0.0.0",9501,SWOOLE_PROCESS,SWOOLE_SOCK_TCP);

$serv->on("start",function(swoole_server $serv){
    echo 'server start!'.PHP_EOL;
});

$serv->on("connect",function(swoole_server $serv,$fd,$reactorId){

});

$serv->on("receive",function(swoole_server $serv,$fd,$reactorId,$data){

//    if($serv->exist($fd)){
//        $serv->send($fd,$data.'==='.date("Ymdhis"));
//    }

    $serv->send($fd,$data.'==='.date("Ymdhis"));
    if(trim($data)=='pause'){
        $serv->pause($fd);
        echo '准备停止接受你的请求'.PHP_EOL;
        $serv->send($fd,'准备停止接受你的请求');
        $serv->after(10000,function()use($serv,$fd){
            echo '准备开始接受你的数据'.PHP_EOL;
            $serv->resume($fd);
            $serv->send($fd,"请开始传输数据");
        });
    }
});

$serv->on("close",function(swoole_server $serv,$fd,$reactorid){

});

$serv->start();