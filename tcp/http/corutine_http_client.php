<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/30
 * Time: 14:09
 */

go(function(){
    $cli = new Swoole\Coroutine\Http\Client('127.0.0.1', 2348);
    $cli->setHeaders([
        'Host' => "localhost",
        "User-Agent" => 'Chrome/49.0.2587.3',
        'Accept' => 'text/html,application/xhtml+xml,application/xml',
        'Accept-Encoding' => 'gzip',
        "name"=>"swoole协程客户端请求",
    ]);

    $cli->setMethod("DELETE");

    $cli->set([ 'timeout' => 1]);
    //$cli->get('/User/getA?name=tom&age=18');

    //$cli->post("/User/getA",['name'=>'lucy','age'=>100,'address'=>'北京']);
//    $cli->addFile("/home/itkucode/sw/tcp/http/server.php","file1");
//    $cli->post("/User/getA",['file2'=>'file3']);

    //$cli->download("/Article/style/client.css",__DIR__."/client.css");


    $cli->post("/User/getA",[]);
    $cli->setData("id=3");
    echo $cli->body;

    echo  socket_strerror($cli->errCode).PHP_EOL;
    echo $cli->statusCode.PHP_EOL;
    $cli->close();
});
