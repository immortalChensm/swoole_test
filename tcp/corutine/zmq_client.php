<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/30
 * Time: 11:48
 */


    $context = new ZMQContext(1);

    $client = new ZMQSocket($context,ZMQ::SOCKET_REQ);


    $client->connect("tcp://127.0.0.1:8090");

    $client->send("你好，zmq");


    $server_data = $client->recv();
    if($server_data){
        echo "来自zmq服务器的数据是：".$server_data.PHP_EOL;
    }

