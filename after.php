<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/3
 * Time: 11:40
 */
$server = new swoole_server("0.0.0.0",2346);

$server->on("receive",function(swoole_server $server,$fd,$reactorId,$data){
    echo "data:".$data.PHP_EOL;

    echo "过一伙执行我".PHP_EOL;
    $server->defer(function (){
        echo "run me defer".PHP_EOL;
    });

    
    if (trim($data) == 'after'){
        $server->send($fd,date("Ymdhis"));
    }


});

$server->start();