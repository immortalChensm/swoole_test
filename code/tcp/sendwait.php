<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/27
 * Time: 21:48
 */

class Myserver extends swoole_server
{
    public function run(Array $config)
    {
        $this->addlistener("127.0.0.1",9502,SWOOLE_SOCK_UDP);
        $this->set($config);
        $this->on("receive",[$this,'OnReceive']);
        $this->on("packet",[$this,'OnPacket']);
        $this->on("start",[$this,'OnStart']);
        $this->start();
    }

    public function OnStart(swoole_server $server){
        echo "swoole ".SWOOLE_VERSION."start!".PHP_EOL;
    }

    public function OnPacket(swoole_server $swoole_server,$data,$client){
        echo "data".$data.PHP_EOL;
        $this->sendto($client['address'],$client['port'],$data);
    }

    public function OnReceive(swoole_server $server,$fd,$reactorId,$data){
        echo "data".$data.PHP_EOL;
        $this->sendwait($fd,$data);
    }
}
(new Myserver("0.0.0.0",9501,SWOOLE_BASE,SWOOLE_SOCK_TCP))->run(['worker_num'=>3]);