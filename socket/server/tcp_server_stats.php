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
        ]);
        $this->serv->on("start",[$this,'onStart']);
        $this->serv->on("connect",[$this,'connect']);
        $this->serv->on("receive",[$this,'receive']);
        $this->serv->on("close",[$this,'close']);
        $this->serv->start();
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
    }

    public function receive(swoole_server $serv,$fd,$reactorId,$data)
    {
        $serv->send($fd,$data);
        if(trim($data)=='stats'){
            print_r($serv->stats());
        }
    }

    public function close(swoole_server $serv,$fd,$reactorId)
    {

    }
}

(new Server())->start();
