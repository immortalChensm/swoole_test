<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/17
 * Time: 10:48
 */

$serv = new swoole_server("127.0.0.1", 9501);


$serv->set(array(
    //'worker_num' => 2,    //开启两个worker进程
    //'max_request' => 3,   //每个worker进程max request设置为3次
    //'dispatch_mode'=>3,
    //'max_connection'=>100,


    //'open_eof_check'=>true,//请求边界检测
    //'package_eof'=>"\r\n",//请求边界符
    //"open_eof_split"=>true,
    "buffer_high_watermark"=>8*10,//最高水位 缓冲区
    "buffer_low_watermark"=>8*2,


));

$serv->addListener("0.0.0.0","9502",SWOOLE_SOCK_TCP);
$serv->addListener("0.0.0.0",9503,SWOOLE_SOCK_UDP);

class Server
{
    public static function start(swoole_server $serv){
        echo 'Master主进程启动'.PHP_EOL;
        echo 'Master主进程pid:'.$serv->master_pid.PHP_EOL;
        echo 'Manager管理进程pid:'.$serv->manager_pid.PHP_EOL;
        echo 'worker进程id:'.$serv->worker_id.PHP_EOL;
        echo 'worker进程pid:'.$serv->worker_pid.PHP_EOL;
    }

    public static function workerstart(swoole_server $serv, int $worker_id)
    {
        echo 'worker进程启动'.PHP_EOL;
        echo 'worker进程pid:'.$serv->worker_pid.PHP_EOL;
        echo 'worker进程id:'.$serv->worker_id.PHP_EOL;

        if($serv->taskworker){
            echo '当前进程号'.$serv->worker_id.",是task进程".PHP_EOL;
        }else{
            echo '当前进程号'.$serv->worker_id.",是worker进程".PHP_EOL;
        }

        echo '当前进程是：'.$worker_id.PHP_EOL;
    }

    public static function connect(swoole_server $serv, $fd, $reactorId)
    {
        echo '有个家伙连接进来了'.PHP_EOL;
        echo '它的fd是:'.$fd.PHP_EOL;
        echo '线程id是:'.$reactorId.PHP_EOL;
    }

    public static function onclose(swoole_server $serv, $fd, $reactorId)
    {
        echo '有个家伙离开了'.PHP_EOL;
        echo '离开的fd是:'.$fd.PHP_EOL;
        echo '它是从线程：'.$reactorId."过来的".PHP_EOL;
    }

    public static function receive(swoole_server $serv, $fd, $from_id, $data)
    {
        echo '收到客户端的数据，目前连接数是：'.count($serv->connections).PHP_EOL;
        echo '客户端fd:'.$fd.PHP_EOL;
        echo '来自哪个主进程的哪个子线程:'.$from_id.PHP_EOL;
        echo '数据包是：'.$data.PHP_EOL;

        $serv->send($fd,$data);
    }
}

$serv->on("start",[Server::class,'start']);
$serv->on("workerstart",[Server::class,'workerstart']);
require 'Test.php';
$test = Test::getInstance();
$serv->on("connect",[$test,'onConnect']);
$serv->on("close",[Server::class,'onclose']);


//监听数据接收事件
$serv->on('receive', [Server::class,'receive']);
//启动服务器
$serv->start();