<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/30
 * Time: 21:37
 */

echo "masterid[".posix_getpid().']'.PHP_EOL;
swoole_process::daemon();
$receive = new swoole_process(function(swoole_process $process){

//    $server = new swoole_http_server("0.0.0.0",9501);
//    $server->on("start",function(swoole_http_server $server){
//        echo "receive进程启动，请发起一个http请求吧".PHP_EOL;
//    });
//    $server->on("request",function (swoole_http_request $request,swoole_http_response $response)use($process){
//        $process->write($request->get['words']);
//    });
//    $server->start();

      $file = fopen("./daemon.txt","wb");
      swoole_coroutine::fwrite($file,posix_getpid().date("Ymdhis"));
},true);

$receive->start();


