<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/28
 * Time: 15:08
 */

class Myserver extends swoole_server
{

    public function run()
    {
        $this->on("start",[$this,'OnStart']);
        $this->on("receive",[$this,'OnReceive']);
        $this->start();
    }

    public function OnStart(swoole_server $server){
        echo "服务器启动成功".PHP_EOL;
    }

    public function OnReceive(swoole_server $server,$fd,$reactorI,$data){

        echo "data".$data.PHP_EOL;


        $server->send($fd,$data);
    }
}

(new Myserver("0.0.0.0",9501))->run();