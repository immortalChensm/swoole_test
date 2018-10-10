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
        $this->tcp = new swoole_server("0.0.0.0", 2346);

        $this->tcp->set([
            'worker_num'=>2,
            "dispath_mode"=>5,

//            'open_length_check'     => true,
//            'package_length_type'   => 'N',//N　无符号４个字节３２位
//            'package_length_offset' => 0,       //第N个字节是包长度的值
//            'package_body_offset'   => 4,       //第几个字节开始计算长度
//            'package_max_length'    => 20000,  //协议最大长度
                'open_mqtt_protocol'=>true,
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

        $serv->send($fd,'hi');
    }

    //监听数据接收事件
    public function receive(swoole_server $serv, $fd, $from_id, $data) {
        echo '这个家伙发送过来的数据是:'.$data.PHP_EOL;
        echo '来自哪个工作线程:'.$from_id.PHP_EOL.'线程号是:'.print_r($serv->getClientInfo($fd));
        echo '处理它的工作进程是:'.$serv->worker_id.PHP_EOL."工作进程的id号：".$serv->worker_pid.PHP_EOL;

        echo '当前连接人数：'.count($serv->connections)."fd=".$fd;

        echo '数据包长度：'.strlen($data).PHP_EOL;

//        $strData = substr($data,4);
//        $sendData = unserialize($strData);
//        print_r($sendData);
        $serv->send($fd,$data);
        print_r($data);
//        if(strpos($data,":")){
//            $client_data = explode(":",$data);
//            $uid = $client_data[0];
//            $msg = $client_data[1];
//
//            if(!isset($serv->getClientInfo($fd)['uid'])){
//                $serv->bind($fd,$uid);
//                $serv->send($fd,'绑定成功');
//            }
//        }elseif(strpos($data,"@")){
//
//            $client_data = explode("@",$data);
//            $msg = $client_data[0];
//            $uid = $client_data[1];
//
//            foreach($serv->connections as $fds){
//                if(isset($serv->getClientInfo($fds)['uid'])&&$serv->getClientInfo($fds)['uid']==$uid){
//                    echo '准备给'.$uid.'发送'.$msg.PHP_EOL;
//                    if(($serv->exist($fds))){
//                        $serv->send($fds,$msg."\r\n");
//                    }else{
//                        echo '不存在此'.$uid.PHP_EOL;
//                    }
//
//                }
//            }
//        }else{
//            $msg = 'null';
//            $serv->send($fd,$data."*");
//        }
        //print_r($serv->getClientInfo($fd));


    }

    //监听连接关闭事件
    public function close($serv, $fd) {
        echo "Client: Close.\n";
    }

}

(new Tcp())->run();