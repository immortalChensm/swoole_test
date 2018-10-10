<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 10:21
 */

class Server
{
    private $serv = null;
    private $fdList = [];
    public function start()
    {
        $this->serv = new swoole_server("0.0.0.0",9501,SWOOLE_PROCESS,SWOOLE_SOCK_TCP);
        $this->serv->set([
            "worker_num"=>3,
            "reactor_num"=>3,
            'enable_delay_receive'=>true,
        ]);
        $this->serv->on("start",[$this,'onStart']);
        $this->serv->on("connect",[$this,'connect']);
        $this->serv->on("receive",[$this,'receive']);
        $this->serv->on("close",[$this,'close']);


        $this->serv->on("workerStart",[$this,'onWorkerStart']);

        $this->serv->start();
    }

    public function onWorkerStart(swoole_server $serv,$workerid)
    {
        if($serv->taskworker){
            echo '当前启动的进程是task进程，进程号为:'.$serv->worker_pid.'==='.$workerid.PHP_EOL;
        }else{
            echo '当前启动的进程是worker进程，进程号为:'.$serv->worker_pid.'==='.$workerid.PHP_EOL;
        }
    }
    public function onStart(swoole_server $serv)
    {
        echo "*************************************\r\n";
        echo "**                                 **\r\n";
        echo "**   swoole server is start!       **\r\n";
        echo "**                                 **\r\n";
        echo "**                                 **\r\n";
        echo "*************************************\r\n";


    }

    public function connect(swoole_server $serv,$fd,$reactorId)
    {
        echo "连接的客户端fd是：".$fd.PHP_EOL;
        echo '来自'.$reactorId."线程".PHP_EOL;

        $serv->after(3000,function()use($serv,$fd){
            $serv->confirm($fd);
            //$serv->send($fd,"时间到了，你要吧发送数据了");
            echo '时间到了，准备接受';
        });
    }

    public function receive(swoole_server $serv,$fd,$reactorId,$data)
    {
        $serv->send($fd,"你的数据是：".$data);
    }

    public function close(swoole_server $serv,$fd,$reactorId)
    {

    }

}

(new Server())->start();

