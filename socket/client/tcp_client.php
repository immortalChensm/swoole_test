<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 15:31
 */

$client = new swoole_client(SWOOLE_SOCK_TCP|SWOOLE_SSL);
$client->set([
    'ssl_verify_peer'=>true,
    'ssl_host_name'=>'123.56.12.53',
    'ssl_cafile'=>'/home/itkucode/sw/socket/client/swcacert.pem'
]);
$client->connect("123.56.12.53",2346);

if($client->isConnected()){

        //if($client->enableSSL()){
            $client->send("nihao");
            $file = "php_client.php";

            //$client->sendfile($file,0,10);

            $data = $client->recv(1024);

            print_r($data);

            //print_r($client->getsockname());
        //}





    $client->close();

}else{
    print_r("还没有连接服务器");
}
