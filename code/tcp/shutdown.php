<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/27
 * Time: 19:04
 */


class Server
{

    private $server;

    public function run()
    {
        $this->server = new swoole_server("0.0.0.0", 9501);
        $this->server->on("start", [$this, 'start']);
        $this->server->on("shutdown", [$this, 'shutdown']);
        $this->server->on("receive", [$this, 'receive']);
        $this->server->start();
    }

    public function start(swoole_server $server)
    {
        echo "master start[" . $server->master_pid . ']' . PHP_EOL;
    }

    public function shutdown(swoole_server $server)
    {
        echo "master shutdown" . PHP_EOL;
    }

    public function receive(swoole_server $server, $fd, $reactorid, $data)
    {
        echo "data" . $data . PHP_EOL;
        if (trim($data) == 'shutdown') {
            $server->shutdown();
        } else {
            $server->send($fd,$data);
        }
    }
};
(new Server())->run();