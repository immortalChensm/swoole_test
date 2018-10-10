<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/30
 * Time: 11:45
 */

$socket = new ZMQContext(1);

$server = new ZMQSocket($socket,ZMQ::SOCKET_REP);

$server->bind("tcp://0.0.0.0:8090");

while(1){
    $data = $server->recv();

    echo $data.PHP_EOL;

    $server->send($data);
}