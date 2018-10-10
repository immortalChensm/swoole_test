<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/25
 * Time: 16:11
 */
class Tcp
{
    private $tcp = null;
    private $clientUids = [];
    private $table = null;
    public function run()
    {
        $this->tcp = new swoole_server("0.0.0.0", 8888);

        $this->tcp->set([
            'worker_num'=>2,
            "dispath_mode"=>2,
        ]);
        $this->tcp->on("connect",[$this,'connect']);
        $this->tcp->on("receive",[$this,'receive']);
        $this->tcp->on("close",[$this,'close']);
        $this->tcp->on("start",[$this,'onstart']);
        $this->tcp->on("ManagerStart",[$this,'onManageStart']);

        $this->createTable();

        $this->tcp->start();
    }

    private function createTable()
    {
        $this->table = new \Swoole\Table(8);
        $this->table->column('data',\Swoole\Table::TYPE_STRING, 10);
        $this->table->create();
        //$table->set(1,[]);
    }

    public function onstart($serv)
    {
        echo '主进程启动，进程号为'.$serv->master_pid.PHP_EOL;

    }
    public function onManageStart(swoole_server $server)
    {
        echo '管理进程启动，进程号为'.$server->manager_pid.PHP_EOL;
    }
    //监听连接进入事件
    public function connect($serv, $fd) {
        echo "有个家伙连接过来了\n";
    }

    //监听数据接收事件
    public function receive(swoole_server $serv, $fd, $from_id, $data) {
        echo '这个家伙发送过来的数据是:'.$data.PHP_EOL;
        echo '来自哪个工作线程:'.$from_id.PHP_EOL.'线程号是:'.print_r($serv->getClientInfo($fd));
        echo '处理它的工作进程是:'.$serv->worker_id.PHP_EOL."工作进程的id号：".$serv->worker_pid.PHP_EOL;

        //serviceName:username
        if(strpos($data,":")){
            $client_data = explode(":",$data);

            if($client_data[0]=='reg'){
                //if(!isset($this->clientUids[$client_data[1]])){
                    $this->clientUids[$client_data[1]] = $fd;
                    $this->table->set($client_data[1],['username'=>$fd]);
                //}
            }elseif($client_data[0]=='msg'){
                $msg = $client_data[0];
                $who = $client_data[1];
                $content = $client_data[2];
                $to = $this->table->get($who);
                //print_r($to);
                //print_r($this->tcp->connections);
                //$serv->send($to['username'],$content);
                foreach($serv->connections as $connection){
                    $serv->send($connection,$content);
                }
            }else{
                $serv->send($fd,'你要的服务没有');
            }
        }else{
            $serv->send($fd,json_encode($this->clientUids));
        }
        //$serv->send($fd, "Server: hello".$data);
    }

    //监听连接关闭事件
    public function close($serv, $fd) {
        echo "Client: Close.\n";
    }

}

(new Tcp())->run();