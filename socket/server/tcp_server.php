<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/14
 * Time: 12:22
 */

$serv = new swoole_server("0.0.0.0",9501,SWOOLE_PROCESS,SWOOLE_SOCK_TCP);

$process = new swoole_process(function (swoole_process $process)use($serv){

    while(1){
        foreach($serv->connections as $client){
            $data = $process->read();
            $serv->send($client,$data.',process id is:'.$process->pid);
        }
    }

},true);

$serv->addProcess($process);

$serv->addListener("127.0.0.1",9601,SWOOLE_SOCK_TCP);

/********************************************
reactor_num 该参数的设置大小依据cpu核心数来设置  默认大小为cpu_num*4 只有1核的cpu最大只能打开4个reactor线程，超过此值时等于cpu_num*4
worker_num 该参数的用于设置worker进程数量，设置的值与reactor_num有如下关系
1、设置的进程数量只能等于或是超过reactor线程
2、设置的进程数量小于reactor_num时，就会与reactor_num相等
3、获取cpu核心数量是：swoole_cpu_num()

*********************************************/
$serv->set([
    'reactor_num'=>3,
    'worker_num'=>2,
    "reload_async"=>true,
    'max_wait_time'=>5,
]);
$serv->on("start",function (swoole_server $serv){
    echo 'master process is start:'.$serv->master_pid.PHP_EOL;

    echo 'cpu num:'.swoole_cpu_num().PHP_EOL;



});


$serv->on("shutdown",function (swoole_server $serv){
    echo 'server is shutdown'.PHP_EOL;
});

$serv->on("workerstart",function(swoole_server $serv,$workerid){
    echo 'worker process is start:'.$workerid.PHP_EOL;
    echo 'worker pid is:'.$serv->worker_pid.PHP_EOL;
    //echo 'worker pid is:'.$serv->worker_id.PHP_EOL;
    //print_r($serv->setting);
});

$serv->on("workerstop",function(swoole_server $serv,$workerid){
    echo 'worker stop:'.$workerid.PHP_EOL;
});

$serv->on("WorkerExit",function (swoole_server $serv,$workerid){
    echo 'worker exit:'.$workerid.PHP_EOL;
});

$serv->on("managerstart",function (swoole_server $serv){
    echo 'manager process is start:'.$serv->manager_pid.PHP_EOL;
    echo 'worker num:'.$serv->setting['worker_num'].PHP_EOL;
    echo 'reactor num:'.$serv->setting['reactor_num'].PHP_EOL;
});

$serv->on("connect",function (swoole_server $serv,$fd,$reactorId){
    echo 'connect'.PHP_EOL;
});

$serv->on("receive",function(swoole_server $serv,$fd,$reactorId,$data)use($process){
    echo $data.PHP_EOL;
    echo 'fd:'.$fd.PHP_EOL;
    echo 'reactorid:'.$reactorId.PHP_EOL;

    //stop停止指定的worker进程 并触发onworkerstop回调
    if(trim($data)=='stop'){
        echo 'worker process is stop:'.PHP_EOL;
        $serv->stop($serv->worker_id);
    }elseif(trim($data)=='shutdown'){
        //shutdown 关闭服务器
        echo 'server is shutdown now!'.PHP_EOL;
        $serv->shutdown();
    }elseif(trim($data)=='reload'){
        //重启所有的worker进程
        echo '准备重启所有的worker进程'.PHP_EOL;
        $serv->reload();
    }elseif(trim($data)=='close'){
        //关闭当前客户端
        echo '准备关闭客户端的连接'.PHP_EOL;
        $serv->close($fd);
    }
    //客户端是连接哪个端口的
    //print_r($serv->connection_info($fd));
    //向自定义的进程发送数据
    $process->write($data);
    $serv->send($fd,'hi--'.$data);
});

$serv->on("close",function(swoole_server $serv,$fd,$reactorId){
    echo 'close'.PHP_EOL;
});

$serv->start();