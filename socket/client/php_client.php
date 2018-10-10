<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 15:47
 */

$socket = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);

socket_connect($socket,"127.0.0.1",2346);

socket_write($socket,"hi,laobiao",strlen("hi,laobiao"));

while($data = socket_read($socket,8192)){


    print_r($data);

    socket_close($socket);
}