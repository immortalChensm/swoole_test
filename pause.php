<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/3
 * Time: 11:53
 */

$server = new swoole_server("0.0.0.0",2346);

$server->on("receive",function(swoole_server $server,$fd,$reactorId,$data){
    echo "data:".$data.PHP_EOL;
    $server->send($fd,$data);
    if(trim($data) == 'pause'){
        $server->send($fd,"停止接受数据了，不信你发来，我不接");
        $server->pause($fd);

        $server->fd = $server->after(5000,function ()use($server,$fd){
            $server->send($fd,"时间到了马上恢复接受数据");
            $server->resume($fd);
            $server->clearTimer($server->fd);
            
        });


    }

});
$server->start();