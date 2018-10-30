<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/29
 * Time: 22:31
 */
echo posix_getpid().PHP_EOL;
$process = new swoole_process(function(swoole_process $process){

    $client = new swoole_http_client("www.baidu.com",80);
    $client->get("/",function (swoole_http_client $client)use($process){
        $process->write($client->body);
    });
},true);

$pid = $process->start();
print_r($pid);

echo $process->read();

echo "end".PHP_EOL;