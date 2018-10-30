<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/27
 * Time: 21:13
 */

class Myserver extends swoole_server
{
    public function run()
    {
        $this->set([
            'worker_num'=>5
        ]);
        $this->on("receive",[$this,'OnReceive']);
        $this->on("connect",[$this,'OnConnect']);
        $this->on("start",[$this,'OnStart']);
        $this->start();
    }

    public function OnReceive(swoole_server $server,$fd,$reactorId,$data){
        echo "data".$data.PHP_EOL;
        $server->send($fd,"将向你发送文件");
        $server->sendfile($fd,"./stop.php");
        $this->defer(function(){
            echo "文件发送了".PHP_EOL;
        });
    }

    public function OnConnect(swoole_server $server,$fd,$reactorId){
        echo "there is a fd[".$fd."] its reactorId {$reactorId} connect".PHP_EOL;
    }

    public function OnStart(swoole_server $server){
        echo "swoole server is start".PHP_EOL;
    }
}

(new Myserver("0.0.0.0",9501))->run();