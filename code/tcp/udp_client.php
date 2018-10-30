<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/27
 * Time: 21:31
 */


class Myclient extends swoole_client
{

    public function run()
    {
        $this->on("connect",[$this,'OnConnect']);
        $this->on("receive",[$this,'OnReceive']);
        $this->on("error",[$this,'OnError']);
        $this->on("close",[$this,'OnClose']);
        $this->connect("127.0.0.1",9501);
    }

    public function OnConnect(swoole_client $client){
        echo "成功连接udp服务器".PHP_EOL;
        $client->send("Hello,I am udp client");
    }

    public function OnReceive(swoole_client $client,$data){
        echo "收到服务器端的数据：".$data.PHP_EOL;
    }

    public function OnError(swoole_client $client){
        echo "连接出错了".PHP_EOL;
    }

    public function OnClose(swoole_client $client){
        echo "连接关闭了".PHP_EOL;
    }
}

(new Myclient(SWOOLE_SOCK_UDP,SWOOLE_SOCK_ASYNC))->run();