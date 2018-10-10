<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/18
 * Time: 18:01
 */


class Http
{
    private $http = null;
    private $controllerDeepen = 1;
    public function __set($name,$value)
    {
        $this->$name = $value;
    }
    public function start()
    {
        $this->http = new swoole_http_server("0.0.0.0", 2348);
        //此服务器提供http+tcp服务
        $this->http->addListener("0.0.0.0","2347",SWOOLE_SOCK_TCP);

        $this->http->set([
            "worker_num"=>4,//启动４个worker进程
            'document_root' => '/home/itkucode/sw/tcp/Template/',
            'enable_static_handler' => true,
            "task_worker_num"=>2,//启动２个任务进程
            //"log_file"=>"/home/itkucode/sw/tcp/httplog_file.log", 服务器的日志文件
            //"daemonize"=>true,//是否以守护进程方式运行
        ]);
        $this->http->on('request', [$this,'onRequest']);
        $this->http->on("task",[$this,'OnTask']);
        $this->http->on("finish",[$this,'onFinish']);
        $this->http->on("connect",[$this,'Onconnect']);
        $this->http->on("receive",[$this,'Onreceive']);
        $this->http->on("close",[$this,'Onclose']);
        $this->showMsg();
        $this->http->start();
    }
    public function Onconnect($serv, $fd){
        echo "Client:Connect.\n";
    }

    public function Onreceive($serv, $fd, $from_id, $data){
        $serv->send($fd, 'Swoole: '.$data);

        echo "来自客户端的数据是：".$data.PHP_EOL;
    }

    public function Onclose($serv, $fd){
        echo "Client:Connect.\n";
    }

    public function onTask($http, $task_id, $worker_id, $data)
    {
        $response = Swoole\Http\Response::create($data);
        $response->end("hi,这里是异步任务的响应");
        echo '异步任务'.PHP_EOL;
        $http->finish("ok");

    }

    public function onFinish()
    {
        echo '异步任务完成'.PHP_EOL;

    }

    private function showMsg()
    {
        $process = new swoole_process([$this,'msg'],false);
        $pid = $process->start();
        swoole_process::wait();
    }

    public function msg(swoole_process $process)
    {
        //$result = $process->exec("/usr/bin/pstree",[' -ap|grep php']);
        //$result = system("/usr/bin/pstree -ap|grep php");
        //echo $result;
        echo 'http serer is running'.PHP_EOL;
        $result = system("lsof -i:2348");
        echo $result;
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
        \App\app::getInstance($request,$response,$loader)->run($this->controllerDeepen);


    }

    public function stop()
    {
        $this->http->shutdown();
    }

    public function cmd()
    {
        $cmd = fgets(STDIN);
        switch ($cmd){

        }
    }
}

$http = new Http();
$http->controllerDeepen = 1;
$http->start();
