<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/16
 * Time: 17:34
 */

$serv = new swoole_server("0.0.0.0", 9501, SWOOLE_PROCESS, SWOOLE_SOCK_TCP);


$serv->set(array(
    'reactor_num' => 4, //reactor thread num
    'worker_num' => 8,    //worker process num
    'backlog' => 128,   //listen backlog
    'max_request' => 50,
    'dispatch_mode' => 1,
));



$serv->on('connect','Onconnect');
$serv->on('receive','Onreceive');
$serv->on('close', 'Onclose');
$serv->start();
function Onconnect($serv, $fd){
    echo "Client:Connect.\n";
}

function Onreceive($serv, $fd, $from_id, $data){
    $serv->send($fd, 'Swoole: '.$data);

    echo "来自客户端的数据是：".$data.PHP_EOL;
}

function Onclose($serv, $fd){
    echo "Client:Connect.\n";
}
