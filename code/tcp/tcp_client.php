<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/27
 * Time: 21:56
 */

class MyClient extends swoole_client
{

    public function run(Array $config)
    {
        $this->on("connect",[$this,'OnConnect']);
        $this->on("receive",[$this,'OnReceive']);
        $this->on("error",[$this,'OnError']);
        $this->on("close",[$this,'OnClose']);
        $this->connect($config['host'],$config['port']);
        $this->talk();
    }

    public function OnConnect(swoole_client $client){
        echo "已经连接了服务器".PHP_EOL;
        $client->send("hi,I am a client");
    }

    public function OnReceive(swoole_client $client,$data){
        echo "接受来自服务器的数据：".$data.PHP_EOL;
    }

    public function OnError(swoole_client $client){
        echo "连接服务器出错".PHP_EOL;
    }

    public function OnClose(swoole_client $client){
        echo "连接关闭了".PHP_EOL;
    }

    public function talk(){
        (new swoole_process(function (swoole_process $process){
            while(1){
                $data = fgets(STDIN,8192);
                if ($data){
                    $this->send($data);
                }
            }
        }))->start();
    }
}

(new Myclient(SWOOLE_SOCK_TCP,SWOOLE_SOCK_ASYNC))->run(['host'=>'127.0.0.1','port'=>9501]);
