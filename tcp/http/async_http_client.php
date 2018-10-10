<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/30
 * Time: 15:25
 */

//Swoole\Async::dnsLookup("www.baidu.com", function ($domainName, $ip) {
    $cli = new swoole_http_client("127.0.0.1", 2348);
    $cli->setHeaders([
        'Host' => "127.0.0.1",
        "User-Agent" => 'Chrome/49.0.2587.3',
        'Accept' => 'text/html,application/xhtml+xml,application/xml',
        'Accept-Encoding' => 'gzip',
    ]);

    //$cli->setMethod("PUT");
    //$cli->setData("name=jack");

    //$cli->setCookies(['name'=>'jackma']);

//    $cli->get('/User/getA', function ($cli) {
//        echo "Length: " . strlen($cli->body) . "\n";
//        echo $cli->body;
//    });

//    $cli->execute("/User/getA",function ($clie){
//        echo "服务器的响应：".$clie->body;
//        echo "cookie:".print_r($clie->cookies);
//    });

//      $cli->addFile("/home/itkucode/sw/tcp/http/server.php","swoole_file1");
//      $cli->addFile("/home/itkucode/sw/tcp/Template/style/client.css","swoole_file2");
//
//      $cli->post("/User/getA",['swoole_file3'=>'dsf'],function ($cli){
//          echo $cli->body;
//      });

        $cli->download("/Article/articles.html",__DIR__."/articles.html",function (\swoole_http_client $cli){
            echo $cli->downloadFile.PHP_EOL;
            $cli->close();
        });

//});