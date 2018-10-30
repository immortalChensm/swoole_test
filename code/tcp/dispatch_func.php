<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/27
 * Time: 15:16
 */

$server = new swoole_server("0.0.0.0",9501);

$server->set([
    'dispatch_func'=>function(swoole_server $server,$fd,$type,$data){
        //var_dump($fd,$type,$data);
        echo "dfd:".$fd.PHP_EOL;
        echo "dtype:".$type.PHP_EOL;
        echo "ddata:".$data.PHP_EOL;
        return intval($data[0]);
    },
]);
$server->on("receive",function (swoole_server $server,$fd,$reactorId,$data){

    echo "fd:".$fd.PHP_EOL;
    echo "reactorId:".$reactorId.PHP_EOL;
    echo "data:".$data;
    $server->send($fd,"您发的数据是：".$data);
});
$server->start();