<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/30
 * Time: 16:20
 */

$client = new swoole_client(SWOOLE_SOCK_TCP);

$client->connect("127.0.0.1",9501);

echo '是否连接了不保证可用：'.$client->isConnected().PHP_EOL;

$client->send("nihao,swoole");

echo $client->recv();

$process = new swoole_process(function (swoole_process $process)use($client){

    while(1){
        $data = fgets(STDIN);

        if($data){
            //$client->send($data);
            $client->sendfile("/home/itkucode/sw/tcp/tcp/server_tcp.php");
            //$client->sendto("127.0.0.1","haha");
            echo $client->recv().PHP_EOL;

            print_r($client->getsockname());
            //print_r($client->getPeerCert());
           // print_r($client->getpeername());
        }
    }
},false);
$pid = $process->start();
echo $pid.PHP_EOL;
echo 'client 主进程启动'.posix_getpid();

while(1){
    ;
}