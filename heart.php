<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/1
 * Time: 15:01
 */
echo "server进程启动：".posix_getpid().PHP_EOL;

$server = new swoole_server('0.0.0.0',2346);
$server->set([
    'heartbeat_check_interval'=>2,//每3秒检测一次时间达到没有
    'heartbeat_idle_time'=>30,//30秒内未发任何数据给服务器将关掉连接
]);
$server->on("connect",function(swoole_server $server,$fd,$reactorId){
    echo "有个请求连接了".$fd.PHP_EOL;
});

$server->on("receive",function (swoole_server $server,$fd,$reactorId,$data){
    echo "客户端发来的数据是：".$data.PHP_EOL;

    print_r($server->heartbeat());
    print_r($server->getLastError());
    $server->send($fd,$data);
});

$server->on("close",function (swoole_server $server,$fd,$reactorId){
    echo "close".PHP_EOL;
});


echo "server run".PHP_EOL;
$server->start();

print_r($server->heartbeat());