<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/23
 * Time: 16:23
 */


class Websocket
{
    private $server = null;
    public function start()
    {
        $this->server = new swoole_websocket_server("0.0.0.0", 2346);

        $this->server->on("open",[$this,'onOpen']);
        $this->server->on("message",[$this,'onMessage']);
        $this->server->on("close",[$this,'onClose']);
        $this->server->on("request",[$this,'onRequest']);
        $this->server->start();
    }
    public function onOpen(swoole_websocket_server $server, $request)
    {
        echo '打开连接时触发'.PHP_EOL;
        print_r($request);
        echo "server: handshake success with fd{$request->fd}\n";
    }

    public function onMessage(swoole_websocket_server $server, $frame)
    {
//        echo '发消息时触发'.PHP_EOL;
//        print_r($frame);
//
//        echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
//
//        if($frame->data=='close'){
//            echo 'websocket关闭客户端的连接';
//            $server->disconnect($fd,2000,'客户端主动发起的关闭请求');
//        }
//        $server->push($frame->fd, "this is server");

        foreach ($this->server->connections as $fd){

            //print_r($this->server->connection_info($fd));

            $content = $this->server->pack($frame->data, 1, 1, 0);
            $this->server->send($fd,$content);


        }
    }

    public function onClose($ser, $fd)
    {
        echo "client {$fd} closed\n";
    }

    public function onRequest($request, $response)
    {
        foreach ($this->server->connections as $fd){

            //print_r($this->server->connection_info($fd));
            if($this->server->connection_info($fd)['websocket_status']!=0){

                if($this->server->exist($fd)){
                    $content = $this->server->pack('hello'.$request->get['words'], 1, 1, 0);
                    print_r($content);


                    $this->server->send($fd,$content);
                    //$this->server->push($fd,$request->get['words'].$content);
                }else{
                    echo 'ws客户端不存在';
                }

            }

        }
    }
}

(new Websocket())->start();
