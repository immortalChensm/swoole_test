<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/6
 * Time: 11:34
 */


$http = new swoole_http_server("0.0.0.0", 2346);

$http->set(
    [
        'worker_num'=>3,
        'max_coroutine'=>2,
    ]
);
$http->on("Start",function(swoole_http_server $http){
    echo 'http_server master start'.'mid is:'.$http->master_pid.PHP_EOL;
});

$http->on("WorkerStart",function(swoole_http_server $http){
    echo 'worker process is start,it pid is'.$http->worker_pid.PHP_EOL;
});

$http->on("connect",function(swoole_http_server $http,$fd,$reactor_id){
    echo 'there somebody comming'.PHP_EOL;
});
$http->on("request", function ($request, $response) {


    if($request->server['request_uri']!='/favicon.ico'){
        /***
        tcp协程客户端
        //$client = new Swoole\Coroutine\Client(SWOOLE_SOCK_TCP);
        $client = new Co\Client(SWOOLE_SOCK_TCP);

        //echo 'tcp_client协程id:'.$client->getuid().PHP_EOL;
        echo 'tcp_co_id'.Swoole\Coroutine::getuid().PHP_EOL;

        //print_r($request->server);

        $client->connect("127.0.0.1", 9501, 0.5);
        //调用connect将触发协程切换
        $client->send("hello world from swoole");
        //调用recv将触发协程切换
        $ret = $client->recv();
         * $client->close();
         *
         *
         *
        //创建一个协程
        go(function(){
        $db = new Co\MySQL();
        $server = array(
        'host' => '127.0.0.1',
        'user' => 'root',
        'password' => '1jackCsm*',
        'database' => 'swoole',
        );

        $db->connect($server);

        $result = $db->query('show databases');

        Swoole\Coroutine::sleep(5);

        var_dump($result);
        });
         *
         *
        go(function(){
        echo 'co1 run'.PHP_EOL;
        Co::sleep(3);
        go(function(){
        echo 'col2 run'.PHP_EOL;
        Co::sleep(2);
        go(function(){
        echo 'co3 run'.PHP_EOL;
        });
        echo 'col2 run end'.PHP_EOL;
        });
        echo 'col1 run end'.PHP_EOL;
        });

        go(function(){
        echo 'run me'.PHP_EOL;
        });

        $response->header("Content-Type", "text/plain");
        $response->end('http响应请求');

        go(function (){
        echo 'run finish'.PHP_EOL;
        });
         *
        $id = go(function(){

        $id = co::getuid();

        echo 'start main co'.$id.PHP_EOL;

        echo 'start resume co1'.PHP_EOL;

        co::suspend();

        echo 'start resume co2'.PHP_EOL;

        co::suspend();

        echo 'co2 end'.PHP_EOL;


        });
         *
         *  echo 'main run'.PHP_EOL;

        co::resume($id);

        echo 'co1 end'.PHP_EOL;

        co::resume($id);

        echo 'co2 end'.PHP_EOL;

         * echo '正在运行到这里－－中断源－－中断请求'.PHP_EOL;
        Co::create(function(){
        echo '－－中断响应运行到我这里了，马上运行到原点－－中断返回'.PHP_EOL;
        });

        echo '终于到达－－中断结束了'.PHP_EOL;

        echo '继续跑到我这里了'.PHP_EOL;


        $response->end("co status");
         *
         * //协程方式读取文件。

        function Coroutine::fread(resource $handle, int $length = 0);
         *  $file = "/home/itkucode/sw/tcp/tcp/baidu.html";
        file_put_contents( $file,file_get_contents("http://www.baidu.com"),FILE_APPEND);
        $fd = fopen($file,"r");
        $con = fread($fd,900000);
        $response->end($con);
         *
         * $fd = fopen($file,"r");

        //$con = Co::fread($fd,900000);
        fseek($fd,90000);
        $con = Co::fgets($fd,900000);
         *   //写文件
         * Co::create(function()use($response){
        $file = "/home/itkucode/sw/tcp/tcp/baidu.log";
        $fd = fopen($file,"w");
        Co::fwrite($fd,"hello,world");

        //$file_data = Co::fread($fd);
        $response->end("hello,world");
        });
         *
         * millisecond              1ms (毫秒)       1毫秒=0.001秒=10-3秒
        microsecond           1μs (微秒)         1微秒=0.000001=10-6秒
        nanosecond            1ns (纳秒)         1纳秒=0.0000000001秒=10-9秒
        picosecond             1ps (皮秒)          1皮秒=0.0000000000001秒=10-12秒
        femtosecond          1fs (飞秒)            1飞秒=0.000000000000001秒=10-15
         * 1秒＝１０００毫秒　１毫秒＝１０００微秒　１微秒＝１０００纳秒　１纳秒＝１０００皮秒　１皮秒＝１０００飞秒
         *
         *  $start = micrtime_float();
        //0.001秒＝1000*0.001=1毫秒
        //0.000001秒=1000*0.000001=0.001毫秒*1000=1微秒
        Co::sleep(0.000001);//１微秒
        $end = time();


        $end = micrtime_float();
        echo '耗时时间是：'.(float)$end-(float)$start.PHP_EOL;
         **/

        //$ip = Co::getHostByName("www.baidu.com");
        //$ip = swoole_async_dns_lookup("www.baidu.com");
        //$ip = Co::getAddrInfo("www.baidu.com");
        //print_r($request->header);
        //print_r(Co::getHostByName("www.baidu.com"));
        //print_r(microtime());

        //$ret = Co::exec("cat /proc/cpuinfo");
        //$file = "/home/itkucode/sw/tcp/tcp/baidu.log";
        //$con = Co::readFile($file);

        //$file = "/home/itkucode/sw/tcp/tcp/swoole.log";
        //Co::writeFile($file,"hello,swoole!",FILE_APPEND);
       // $con = Co::readFile($file);
        //当前协程状态
        $status = Co::stats();
        $response->end(json_encode($status));


    }


});

function micrtime_float()
{
    list($usec,$sec) = explode(" ",microtime());
    $time = (float)$usec+(float)+$sec;
    return $time;
}
$http->start();