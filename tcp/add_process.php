<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/17
 * Time: 10:48
 */

$serv = new swoole_server("127.0.0.1", 9501);


$serv->set(array(
    'worker_num' => 10,    //开启两个worker进程
    //'max_request' => 3,   //每个worker进程max request设置为3次
    //'dispatch_mode'=>3,
    //'max_connection'=>100,


    //'open_eof_check'=>true,//请求边界检测
    'package_eof'=>"\r\n",//请求边界符
    "open_eof_split"=>true,
    "buffer_high_watermark"=>8*10,//最高水位 缓冲区
    "buffer_low_watermark"=>8*2,


));

$serv->addListener("0.0.0.0","9502",SWOOLE_SOCK_TCP);
$serv->addListener("0.0.0.0",9503,SWOOLE_SOCK_UDP);

$process = new swoole_process(function(swoole_process $process)use($serv){
    while(true){

        $data = trim($process->read());

        /*foreach($serv->connections as $fd){
            if($data){
                $serv->send($fd,$data);
            }

        }*/
        echo "当前数据长度是:".strlen($data).PHP_EOL;
        echo '当前自定义进程的数据是:'.$data== 'csm';
        if($data=='csm'){
            //$serv->reload();
            echo '相等了';

            $serv->reload();
        }elseif($data=='stop'){
            echo '停止worker进程服务'.PHP_EOL;
            $serv->stop();
        }elseif($data=='shutdown'){
            echo '马上停止swoole服务'.PHP_EOL;
            $serv->shutdown();
        }else{
            foreach($serv->connections as $fd){
                if($data){
                    $serv->send($fd,$data);
                }

            }
        }
    }
},false);



$serv->addProcess($process);



class Server
{

    public static $process = null;

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
        //将发前发送过来的数据扔到一个自定义的进程里处理

        self::$process->write($data);
        /*$a = $data;
        if($a=='reload'){
            echo '重启worker进程';
            $serv->reload();

        }*/

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
}

$serv->on("start",[Server::class,'start']);
$serv->on("workerstart",[Server::class,'workerstart']);
$serv->on("Connect",[Server::class,'connect']);
$serv->on("close",[Server::class,'onclose']);
//监听数据接收事件
Server::$process = $process;
$serv->on('receive', [Server::class,'receive']);
//启动服务器
$serv->start();