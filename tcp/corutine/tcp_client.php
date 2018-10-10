<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/25
 * Time: 17:08
 */

$client = new swoole_client(SWOOLE_SOCK_TCP);
if (!$client->connect('127.0.0.1', 8888, -1))
{
    exit("connect failed. Error: {$client->errCode}\n");
}

$client->on("connect",function(swoole_client $client){
    echo '服务器连接成功了，你可以随便发消息了，老表'.PHP_EOL;
});

$read = new swoole_process(function(swoole_process $read)use($client){
    while(1){
        $data = $client->recv();
        echo $data.PHP_EOL;
    }
});
$read->start();

$write = new swoole_process(function(swoole_process $write)use($client){
    while(1){
        $data = fgets(STDIN);
        if($data){

            $client->send($data);
        }
    }
});

$write->start();
while(1){
    ;
}
#$client->close();