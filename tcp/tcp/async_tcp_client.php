<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/30
 * Time: 16:46
 */

(new class{
    private $client = null;
    public function run()
    {

        $this->client = new swoole_client(SWOOLE_SOCK_TCP, SWOOLE_SOCK_ASYNC);
        $this->client->on("connect",[$this,'OnConnect']);
        $this->client->on("receive",[$this,'Onreceive']);
        $this->client->on("error",[$this,'Onerror']);
        $this->client->on("close",[$this,'Onclose']);
        $this->client->connect('127.0.0.1', 9501);
    }

    public function OnConnect(swoole_client $cli){
        $cli->send("采用异步连接的tcp客户端");
    }

    public function Onreceive(swoole_client $cli, $data){
        echo "Receive: $data".PHP_EOL;
        $cli->send(str_repeat('A', 100)."\n");
        //sleep(1);

        //$cli->close();
        $cli->sleep();

        swoole_timer_after(1000,function ()use($cli){
            echo '我睡好了，马上接受数据'.PHP_EOL;
            $cli->wakeup();
        });
    }

    public function Onerror(swoole_client $cli){
        echo "连接错误\n".PHP_EOL;
    }

    public function Onclose(swoole_client $cli){
        echo "连接关闭了哦\n".PHP_EOL;
    }
})->run();

