<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 17:54
 */

$httpserver = new swoole_http_server("0.0.0.0",2346);
$httpserver->set([
    "worker_num"=>5,
    'document_root' => '/home/itkucode/sw/socket/http/html',
    'enable_static_handler' => true,
]);

$httpserver->on("start",function (swoole_http_server $serv){
    echo 'http服务器启动成功！'.PHP_EOL;
});
$httpserver->on("request",function (swoole_http_request $request,swoole_http_response $response)use($httpserver){

    //echo "处理当前请求的worker进程是：".$httpserver->worker_pid.PHP_EOL;
    print_r($request->header);
    print_r($request->server);
    //print_r($request->get);
    print_r($request->post);
    //print_r($request->cookie);
    //print_r($request->files);
    //print_r($request->rawContent());

    //print_r($request->getData());
    //$response->header("Server","jackcsm");
    //$response->cookie("name","jack");
    //$response->status(999);

    //$response->gzip(5);
    //$file = file_get_contents("http://www.baidu.com");

    //$response->end($file);
    //$response->redirect("http://www.baidu.com");
   // $response->write("hello,swoole");
	$response->write(json_encode($request->post));	
});

$httpserver->on("close",function (swoole_http_server $serv){
    //echo '客户端关闭了请求';
});

$httpserver->start();
