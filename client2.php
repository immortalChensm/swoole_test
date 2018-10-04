<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/3
 * Time: 14:52
 */

echo "1".PHP_EOL;

//$server = new swoole_client(SWOOLE_SOCK_TCP|SWOOLE_SSL);
$server = new swoole_client(SWOOLE_SOCK_TCP);
$server->set([
    //'ssl_cert_file' => __DIR__.'/cert/sw_cert.crt',
    //'ssl_key_file' => __DIR__.'/cert/sw_key.pem',
    //'ssl_verify_peer'=>true,

]);

if(!$server->connect("127.0.0.1",2346)){
    echo "连接出错".PHP_EOL;
}




$server->send("你好，swoole");

echo $server->recv(8192).PHP_EOL;

echo "2".PHP_EOL;

//if($server->enableSSL()){
//    $server->send("enable ssl");
//    echo $server->recv(8192);
//}
$server->send("在吗,swoole");

echo $server->recv(81092).PHP_EOL;

echo "3".PHP_EOL;

//print_r($server->getPeerCert());

$server->sendfile("test.txt.php");

echo $server->recv(8192);

socket_write($server->sock,"hi,laobiao");
echo $server->recv(8192);