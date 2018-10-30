<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/29
 * Time: 21:21
 */

class Myserver extends swoole_websocket_server
{
    public function run()
    {
        $this->on("start",[$this,'OnStart']);
        $this->on("request",[$this,'OnRequest']);
        $this->on("open",[$this,'OnOpen']);
        $this->on("message",[$this,'OnMessage']);
        $this->on("close",[$this,'OnClose']);
        $this->start();
    }

    public function OnStart(swoole_websocket_server $server){
        echo "websocket 服务器启动".PHP_EOL;
    }

    public function OnRequest(swoole_http_request $request,swoole_http_response $response){

    }

    public function OnOpen(swoole_websocket_server $server,swoole_http_request $request){
        echo "有客户端连接了".$request->fd.PHP_EOL;
    }

    public function OnMessage(swoole_websocket_server $server,$frame){
        print_r($frame);
        $server->push($frame->fd,$frame->data);
    }

    public function OnClose(swoole_websocket_server $server,$fd){
        echo "fd[".$fd.']关闭了连接'.PHP_EOL;
    }
}

(new Myserver("0.0.0.0",2346))->run();