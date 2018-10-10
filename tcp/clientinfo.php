<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/17
 * Time: 10:48
 */

$serv = new swoole_server("127.0.0.1", 9501);

$serv->set(array(
    'worker_num' => 2,    //开启两个worker进程
    //'max_request' => 3,   //每个worker进程max request设置为3次
    //'dispatch_mode'=>3,
    //'max_connection'=>100,


    //'open_eof_check'=>true,//请求边界检测
    'package_eof'=>"\r\n",//请求边界符
    "open_eof_split"=>true,
    "buffer_high_watermark"=>8*10,//最高水位 缓冲区
    //"buffer_low_watermark"=>8*2,
    //'buffer_output_size' => 1 * 1024, //必须为数字 发送缓输出缓冲大小


));
$serv->addListener("0.0.0.0","9502",SWOOLE_SOCK_TCP);
$serv->addListener("0.0.0.0",9503,SWOOLE_SOCK_UDP);


class Server
{

    public static $process = null;

    public static $timer_id = null;

    public static $workerProcess = [];

    public static $clientList = [];

    public static $db = null;

    public static function start(swoole_server $serv){
        echo 'Master主进程启动'.PHP_EOL;
        echo '--Master主进程pid:'.$serv->master_pid.PHP_EOL;
        echo '--Manager管理进程pid:'.$serv->manager_pid.PHP_EOL;
        //echo 'worker进程id:'.$serv->worker_id.PHP_EOL;
        //echo 'worker进程pid:'.$serv->worker_pid.PHP_EOL;

        echo '服务器的配置参数'.PHP_EOL;
        print_r($serv->setting);

        echo '在swoole启动时连接一下数据库'.PHP_EOL;




    }

    public static function workerstart(swoole_server $serv, $worker_id)
    {
        echo 'worker进程启动'.PHP_EOL;
        echo '---worker进程pid:'.$serv->worker_pid.PHP_EOL;
        echo '---worker进程id:'.$serv->worker_id.PHP_EOL;

        if($serv->taskworker){
            echo '---当前进程号'.$serv->worker_id.",是task进程".PHP_EOL;
        }else{
            echo '---当前进程号'.$serv->worker_id.",是worker进程".PHP_EOL;


        }

        //保存worker进程对应的名称
        self::$workerProcess['worker'.$worker_id] = $worker_id;

        echo '当前进程是---：'.$worker_id.PHP_EOL;
    }

    public static function connect(swoole_server $serv, $fd, $reactorId)
    {
        echo '有个家伙连接进来了'.PHP_EOL;
        echo '它的fd是:'.$fd.PHP_EOL;
        echo '线程id是:'.$reactorId.PHP_EOL;

        //将当前连接的客户端保存起来

    }

    public static function onclose(swoole_server $serv, $fd, $reactorId)
    {
        echo '有个家伙离开了'.PHP_EOL;
        echo '离开的fd是:'.$fd.PHP_EOL;
        echo '它是从线程：'.$reactorId."过来的".PHP_EOL;

        echo 'byebye 老表，欢迎下次再来吧'.PHP_EOL;
    }

    public static function receive(swoole_server $serv, $fd, $from_id, $data)
    {
        echo '收到客户端的数据，目前连接数是：'.count($serv->connections).PHP_EOL;
        echo '客户端fd:'.$fd.PHP_EOL;
        echo '来自哪个主进程的哪个子线程:'.$from_id.PHP_EOL;
        echo '数据包是：'.$data.PHP_EOL;
        //判断发送过来的数据
        $data = trim($data);
        echo '客户端的连接信息'.PHP_EOL;
        print_r($serv->getClientInfo($fd));
        $msg = "您所在的worker进程为:".$serv->worker_id.",您发送的数据是：".$data;

        $serv->send($fd,$msg."\r\n");


    }

    public static function onWorkerStop(swoole_server $server, $worker_id)
    {
        echo '当前进程id'.$worker_id.PHP_EOL;
        echo '停止了';
    }

    public static function onShutdown(swoole_server $serv)
    {
        echo 'swoole服务停止'.PHP_EOL;
    }

    public static function onBufferFull(swoole_server $serv,$fd){
        echo '缓冲区空间不够了'.PHP_EOL;
    }

    public static function onManageStart(swoole_server $serv)
    {
        echo '管理进程启动，管理进程为:'.$serv->manager_pid.PHP_EOL;
    }

    //进程间通信
    public static function onPipeMessage(swoole_server $serv, $src_worker_id, $message)
    {
        echo '收到进程'.$serv->worker_id."，进程源：".$src_worker_id.'，消息是：'.$message.PHP_EOL;
    }
}

$serv->on("start",[Server::class,'start']);
$serv->on("workerstart",[Server::class,'workerstart']);
$serv->on("Connect",[Server::class,'connect']);
$serv->on("close",[Server::class,'onclose']);
$serv->on("ManagerStart",[Server::class,'onManageStart']);
$serv->on("PipeMessage",[Server::class,'onPipeMessage']);

//监听数据接收事件

$serv->on('receive', [Server::class,'receive']);
//启动服务器
$serv->start();