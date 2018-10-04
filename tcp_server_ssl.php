<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/1
 * Time: 15:01
 */
echo "server进程启动：".posix_getpid().PHP_EOL;

//$server = new swoole_server('0.0.0.0',2346,SWOOLE_PROCESS,SWOOLE_SOCK_TCP|SWOOLE_SSL);
$server = new swoole_server('0.0.0.0',2346,SWOOLE_PROCESS,SWOOLE_SOCK_TCP);

$server->set([
    'worker_num'=>5,
    //'ssl_cert_file' => __DIR__.'/cert/sw_cert.crt',
    //'ssl_key_file' => __DIR__.'/cert/sw_key.pem',
]);
$server->on("connect",function(swoole_server $server,$fd,$reactorId){
    echo "有个请求连接了".$fd.PHP_EOL;
});

$server->on("receive",function (swoole_server $server,$fd,$reactorId,$data){
    echo "客户端发来的数据是：".$data.PHP_EOL;
    $server->send($fd,$data);
});

$server->on("close",function (swoole_server $server,$fd,$reactorId){
    echo "close".PHP_EOL;
});


echo "server run".PHP_EOL;
$server->start();

