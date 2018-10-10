<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/18
 * Time: 18:01
 */


class Http
{
    private $server = null;
    private $controllerDeepen = 1;
    public function __set($name,$value)
    {
        $this->$name = $value;
    }
    public function start()
    {
        $this->server = new swoole_websocket_server("0.0.0.0",2346);
        $this->server->set([
            "worker_num"=>4,//启动４个worker进程
            'document_root' => '/home/itkucode/sw/tcp/Template/',
            'enable_static_handler' => true,
        ]);
        $this->server->on("open",[$this,'onOpen']);
        $this->server->on("message",[$this,'onMessage']);
        $this->server->on("close",[$this,'onClose']);
        $this->server->on('request', [$this,'onRequest']);


        $this->server->start();
    }

    public function onOpen(swoole_websocket_server $server, $request)
    {
        echo "server: handshake success with fd{$request->fd}\n";
    }

    public function onMessage(swoole_websocket_server $server, $frame)
    {
        echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
        $server->push($frame->fd, "this is server");
    }

    public function onClose($ser, $fd)
    {
        echo "client {$fd} closed\n";
    }

    public function onRequest($request, $response)
    {
        //$response->detach();
        //$this->http->task(strval($response->fd));

        require_once 'autoload.php';
        $loader = new Autoloader();
        $loader->addNameSpace([
            "App\\"=>dirname(__FILE__)."/",
            "HttpController\\"=>dirname(__FILE__)."/HttpController/",
            "Model\\"=>dirname(__FILE__)."/Model/",
        ]);
        \App\app::getInstance($request,$response,$loader,$this->server)->run($this->controllerDeepen);


    }

}

$http = new Http();
$http->controllerDeepen = 1;
$http->start();
