<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/31
 * Time: 20:58
 */


$client = stream_socket_client("tcp://127.0.0.1:2346",$errno,$errstr) or die("连接出错");

$data = json_encode(['data'=>'hellow']);

fwrite($client,pack('N',strlen($data)).$data);
echo fread($client,8192);

fclose($client);