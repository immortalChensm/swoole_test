<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 15:23
 */

/***
openssl
用一个密码加密文件,然后解密也用同样的密码:对称加密
而有些加密时,加密用的一个密码,而解密用另外一组密码:非对称加密
公钥加密数据,然后私钥解密的情况被称:加密解密
私钥加密数据,公钥解密一般被称为:签名和验证签名
 *
openssl genrsa -out sw1prvtkey.pem 1024/2038
openssl req -new -key sw1prvtkey.pem -out swcert.csr
openssl req -new -x509 -key sw1prvtkey.pem -out swcacert.pem -days 1095

 **/
$serv = new swoole_server("0.0.0.0",2346,SWOOLE_PROCESS,SWOOLE_SOCK_TCP|SWOOLE_SSL);

$serv->set([
    'ssl_cert_file' =>'/home/itkucode/sw/socket/client/config/swcacert.pem',
    'ssl_key_file' => '/home/itkucode/sw/socket/client/config/sw1prvtkey.pem',
    'ssl_client_cert_file' => '/home/itkucode/sw/socket/client/config/swcacert.pem',
]);
$serv->on("connect",function(swoole_server $serv,$fd,$reactorid){

    echo '有客户端连接进来了'.PHP_EOL;
    //$serv->send($fd,"发点东西过来");
});

$serv->on("receive",function(swoole_server $serv,$fd,$reactorId,$data){

    print_r($data);
    $serv->send($fd,"your data is:".$data);
});

$serv->on("close",function(swoole_server $serv,$fd,$reactorid){

});
$serv->start();