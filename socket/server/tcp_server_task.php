<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 10:21
 */

class Server
{
    private $serv = null;
    private $fdList = [];
    public function start()
    {
        $this->serv = new swoole_server("0.0.0.0",9501,SWOOLE_PROCESS,SWOOLE_SOCK_TCP);
        $this->serv->set([
            "worker_num"=>3,
            "reactor_num"=>3,
            "task_worker_num"=>10,
        ]);
        $this->serv->on("start",[$this,'onStart']);
        $this->serv->on("connect",[$this,'connect']);
        $this->serv->on("receive",[$this,'receive']);
        $this->serv->on("close",[$this,'close']);

        $this->serv->on("task",[$this,'onTask']);
        $this->serv->on("finish",[$this,'onFinish']);
        $this->serv->on("workerStart",[$this,'onWorkerStart']);

        $this->serv->start();
    }

    public function onWorkerStart(swoole_server $serv,$workerid)
    {
        if($serv->taskworker){
            echo '当前启动的进程是task进程，进程号为:'.$serv->worker_pid.'==='.$workerid.PHP_EOL;
        }else{
            echo '当前启动的进程是worker进程，进程号为:'.$serv->worker_pid.'==='.$workerid.PHP_EOL;
        }
    }
    public function onStart(swoole_server $serv)
    {
        echo "*************************************\r\n";
        echo "**                                 **\r\n";
        echo "**   swoole server is start!       **\r\n";
        echo "**                                 **\r\n";
        echo "**                                 **\r\n";
        echo "*************************************\r\n";


    }

    public function connect(swoole_server $serv,$fd,$reactorId)
    {
        echo "连接的客户端fd是：".$fd.PHP_EOL;
        echo '来自'.$reactorId."线程".PHP_EOL;

        $result = $serv->heartbeat(5);
        print_r($result);
    }

    public function receive(swoole_server $serv,$fd,$reactorId,$data)
    {
        print_r($serv->getLastError());
        $serv->send($fd,$data);
        if(trim($data)=='task'){

            //$serv->task("给我找个妹子",$serv->worker_id);
            //$result = $serv->taskwait("给我找个妹子",1,$serv->worker_id);
            //echo "任务执行的结果是：".$result.PHP_EOL;
            $task = ['给我找个妹子','给我钱花','给我找个富婆'];
            //$result = $serv->taskWaitMulti($task,10);

            $result = $serv->taskCo($task,10);
            foreach($result as $t){
                echo '任务执行结果是：'.$t.PHP_EOL;
            }
        }elseif(trim($data)=='close'){
            $serv->close($fd);
            $serv->send($fd,'close down');
        }
    }

    public function close(swoole_server $serv,$fd,$reactorId)
    {

    }

    public function onTask(swoole_server $serv,$taskid,$src_workerid,$data)
    {
        echo '有个任务过来了，任务id是：'.$taskid.PHP_EOL;
        echo '是'.$src_workerid."进程投递过来的".PHP_EOL;

        echo '任务内容是：'.$data.PHP_EOL;


        //$serv->finish("你分配的任务我做完了");
        return "任务id为：".$taskid."进程为:".$src_workerid."的任务：".$data."我处理完了！";
    }

    public function onFinish(swoole_server $serv,$taskid,$data)
    {
        echo '任务完成的id是:'.$taskid.PHP_EOL;
        echo '完成的结果是：'.$data.PHP_EOL;

    }
}

(new Server())->start();

