<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/16
 * Time: 20:56
 */

$server = new swoole_websocket_server("0.0.0.0",2346);
$server->set([
    "worker_num"=>2,
    "reactor_num"=>2,
    'document_root' => '/home/itkucode/sw/socket/http/html',
    'enable_static_handler' => true,
]);
$server->on("open",function (swoole_websocket_server $server,$request){
    echo "open".PHP_EOL;
    //print_r($request);
});

$server->on("start",function (swoole_websocket_server $server){
    echo "master进程id:".$server->master_pid.PHP_EOL;
    echo "manager进程id:".$server->manager_pid.PHP_EOL;
});

$server->on("managerstart",function (swoole_websocket_server $server){
    echo "Worker进程id:".$server->worker_pid.PHP_EOL;
});

$server->on("message",function(swoole_websocket_server $server,$frame){
    //print_r($frame);

    //$data = swoole_websocket_server::unpack($frame->data);

    //print_r($data);
    //$server->push($frame->fd,'hi,bros');
    //$pack = swoole_websocket_server::pack("你好啊，老铁",1);
    //print_r($pack);
    //$server->send($frame->fd,$pack);

    print_r($server->connection_info($frame->fd));
    $server->push($frame->fd,date("Ymdhis"),WEBSOCKET_OPCODE_BINARY);


});

$server->on("close",function (swoole_websocket_server $server){
    echo "close".PHP_EOL;
});


$server->on("request",function(swoole_http_request $request,swoole_http_response $response){

    //$response->end("hi,laobiao");

    global  $server;
    foreach($server->connections as $fd){
        //$server->push($fd,$request->get['words']);
        if($server->connection_info($fd)['websocket_status']==3){
            if($server->exist($fd)){
                $server->push($fd,$request->get['words']);
            }

        }
    }
});
$server->start();


