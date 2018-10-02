<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/2
 * Time: 12:28
 */
$server = new swoole_server("0.0.0.0",2346);

$server->set([
    'buffer_high_watermark'=>8
]);
$server->on("connect",function (swoole_server $swoole_server,$fd,$reactorId){
    echo "connect fd:".$fd.PHP_EOL;
});
$server->on("receive",function(swoole_server $swoole_server,$fd,$reactorId,$data){
    echo "receive data:".$data.PHP_EOL;
    $post = file_get_contents("http://www.baidu.com");
    for($i=0;$i<1000;$i++){

        $swoole_server->send($fd,$post);
    }
});

$server->on("BufferFull",function(swoole_server $server,$fd){
    echo "buffer is full".PHP_EOL;
    $server->close($fd);
});
$server->on("close",function(swoole_server $swoole_server,$fd,$reactorId){

});

$server->start();