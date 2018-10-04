<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/2
 * Time: 14:28
 */

class Sever
{
    private $server;
    private $process;
    public function __construct()
    {
        $this->server = new swoole_server("0.0.0.0", 2346);

        $this->server->addListener("127.0.0.1",2347,SWOOLE_SOCK_TCP);
        $this->server->addListener("/home/itkucode/sw/swoole/socket.sock",0,SWOOLE_UNIX_STREAM);

        $this->server->listen("0.0.0.0",2348,SWOOLE_SOCK_TCP);

        //$this->userProcess();
        //$this->server->addProcess($this->process);

        $this->server->set([
            "worker_num"=>5
        ]);
        $this->server->on("connect", [$this, 'onConnect']);
        $this->server->on("receive", [$this, 'onReceive']);
        $this->server->on("close", [$this, 'onClose']);
        $this->server->on("workerStart", [$this, 'onWorkerStart']);
        $this->server->on("workerStop", [$this, 'onWorkerStop']);
        $this->server->on("pipemessage", [$this, 'onPipeMessage']);
    }

    public function userProcess()
    {
        $this->process = new swoole_process([$this,'sendMsgToClient'],1);
    }

    public function sendMsgToClient(swoole_process $process)
    {
        while(true){
            $data = $process->read(8192);
            if($data){
                foreach ($this->server->connections as $fd){
                    $this->server->send($fd,$data);
                }
            }
        }
    }
    public function onWorkerStart(swoole_server $server,$workerId)
    {
        echo "worker启动worker_id:".$workerId.PHP_EOL;

    }
    public function onWorkerStop(swoole_server $server,$workerId)
    {
        echo "worker停止worker_id:".$workerId.PHP_EOL;

    }
    public function onConnect(swoole_server $server, $fd, $reactorId)
    {
        echo "connect" . PHP_EOL;

//        while(1){
//            $this->process->write(date("Ymdhis"));
//        }
    }

    public function onReceive(swoole_server $server, $fd, $reactorId, $data)
    {
        echo "fd:".$fd." data:".$data.PHP_EOL;
        $sendId = mt_rand(0,4);
        if($sendId!=$server->worker_id){
            $server->sendMessage($data,$sendId);
        }

        if ($server->exist($fd)){
            print_r($server->getClientInfo($fd));
            print_r($server->connection_info($fd));
        }

        if(trim($data) == 'reload'){
            //$this->server->reload();
            echo '收到reload命令';
            $this->server->reload();
        }elseif(trim($data) == 'stop'){
            echo "收到stop命令";
            $this->server->stop();

        }
        $server->send($fd,json_encode($server->connection_info($fd)));


    }

    public function onPipeMessage(swoole_server $server,$workerId,$message)
    {
        echo "workerid:".$workerId.PHP_EOL;
        echo "message:".$message.PHP_EOL;



    }
    public function onClose(swoole_server $server, $fd, $reactorId)
    {
        echo "close" . PHP_EOL;
    }

    public function run()
    {
        $this->server->start();
    }
}

(new Sever())->run();