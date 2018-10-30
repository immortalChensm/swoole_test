<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/28
 * Time: 16:42
 */

class Myserver extends swoole_http_server
{
    public function run()
    {

        $this->on("request",[$this,'OnRequest']);
        $this->on("start",[$this,'OnStart']);
        $this->on("managerStart",[$this,'OnManagerStart']);
        $this->set([
            'worker_num'=>5,
            'max_request'=>10
        ]);
        $this->start();
    }

    public function OnStart(swoole_http_server $server){
        echo "http_server is start".PHP_EOL;
    }

    public function OnManagerStart(swoole_http_server $server){
        echo "manager process is start [".$server->manager_pid.']'.PHP_EOL;
    }

    public function OnRequest(swoole_http_request $request,swoole_http_response $response){

        //print_r($request->header);
        print_r($request->server);
        //print_r($request->post);
        print_r($request->files);
        print_r($request->post);

        go(function()use($response){

            $mysql = new Swoole\Coroutine\MySQL();
            $mysql->connect([
                'host' => '127.0.0.1',
                'port' => 3306,
                'user' => 'root',
                'password' => '123456',
                'database' => 'swoole',
            ]);
            //$result = $mysql->query("select * from test");
            $stmt = $mysql->prepare("select * from test");
            if ($stmt == false){
                var_dump($mysql->error);
            }
            $ret = $stmt->execute();
            //print_r($result);
            $response->end(json_encode($ret));
        });
        //$response->end('hi,laobiao');
    }


}
(new Myserver("0.0.0.0",2346))->run();