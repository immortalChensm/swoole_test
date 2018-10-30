<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/27
 * Time: 19:26
 */

class Myserver extends swoole_server
{
    public function run()
    {
        $this->on("start",[$this,'Onstart']);
        $this->on("ManagerStart",[$this,'OnManagerStart']);
        $this->on("receive",[$this,'OnReceive']);
        $this->start();
    }

    public function OnStart(swoole_server $server){
        echo "服务器启动成功".SWOOLE_VERSION."正在端口:".$this->port."下监听".PHP_EOL;
    }

    public function OnManagerStart(swoole_server $server){
        echo "Manager进程启动[{$server->manager_pid}]".PHP_EOL;
    }

    public function OnReceive(swoole_server $server,$fd,$reactorId,$data){
        echo "data".$data.PHP_EOL;
        $this->send($fd,$data);
        if (trim($data) == 'after'){
           $this->after(2000,function($data){
               echo "2000:".$data.PHP_EOL;
           },$data);
        }
    }
}
(new Myserver("0.0.0.0",9501))->run();