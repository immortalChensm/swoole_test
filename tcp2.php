<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/1
 * Time: 17:21
 */

class server
{
    private $server;
    public function __construct()
    {
        $this->server = new swoole_server("0.0.0.0",2346,SWOOLE_PROCESS,SWOOLE_TCP);

        $this->server->set([
            'reactor_num'=>2,
            'worker_num'=>3,
            //'max_request'=>3,
            'reload_async'=>true,
            'max_wait_time'=>2,
        ]);

        $this->server->on("connect",[$this,'onConnect']);
        $this->server->on("receive",[$this,'onReceive']);
        $this->server->on("close",[$this,'onClose']);
        //$this->server->on("start",[$this,'onStart']);
        $this->server->on("WorkerStart",[$this,'onWorkerStart']);
        $this->server->on("shutdown",[$this,'onShutdonw']);
        $this->server->on("WorkerStop",[$this,'onWorkerStop']);
        $this->server->on("WorkerExit",[$this,'onWorkerExit']);
    }

    public function onStart(swoole_server $server)
    {
        echo "cpu_num:".swoole_cpu_num();
        echo "master_id:".$server->master_pid.PHP_EOL;
        echo "manager_id:".$server->manager_pid.PHP_EOL;

    }

    public function onWorkerExit(swoole_server $server,$workerid)
    {
        echo "worker进程退出:".$workerid.PHP_EOL;
        swoole_event::del(STDIN);
    }

    public function onShutdonw(swoole_server $server)
    {
        echo "服务器关闭了".PHP_EOL;
    }

    public function onWorkerStart(swoole_server $server,$workerid)
    {
        echo "worker_id:".$workerid.PHP_EOL;
        echo "worker_pid:".$server->worker_pid.PHP_EOL;

        swoole_event::add(STDIN,function(){

            $data = fread(STDIN,8192);
            if($data){
                echo $data.PHP_EOL;
            }
        });
    }

    public function onWorkerStop(swoole_server $server,$workerid)
    {
        echo "worker_id:".$workerid."stop".PHP_EOL;
    }
    public function onConnect(swoole_server $server,$fd,$reactorId)
    {
        echo 'fd:'.$fd.PHP_EOL;
    }

    public function onReceive(swoole_server $server,$fd,$reactorId,$data)
    {
        echo 'data:'.$data.PHP_EOL;
        $server->send($fd,"ok".$data);
    }

    public function onClose(swoole_server $server,$fd,$reactorid)
    {
        echo 'close fd:'.$fd;
    }

    public function start()
    {
        $this->server->start();
    }
};
(new server())->start();