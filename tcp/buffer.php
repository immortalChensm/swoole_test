<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/17
 * Time: 10:48
 */

$serv = new swoole_server("127.0.0.1", 9501);


$serv->set(array(
    //'worker_num' => 2,    //开启两个worker进程
    //'max_request' => 3,   //每个worker进程max request设置为3次
    //'dispatch_mode'=>3,
    //'max_connection'=>100,


    //'open_eof_check'=>true,//请求边界检测
    'package_eof'=>"\r\n",//请求边界符
    "open_eof_split"=>true,
    "buffer_high_watermark"=>8*10,//最高水位 缓冲区
    "buffer_low_watermark"=>8*2,

    'task_worker_num'=>5,
));

$serv->on("start",function (swoole_server $serv){
    echo 'Master主进程启动'.PHP_EOL;
    echo 'Master主进程pid:'.$serv->master_pid.PHP_EOL;
    echo 'Manager管理进程pid:'.$serv->manager_pid.PHP_EOL;
    echo 'worker进程id:'.$serv->worker_id.PHP_EOL;
    echo 'worker进程pid:'.$serv->worker_pid.PHP_EOL;
});

$serv->on("workerstart",function(swoole_server $serv, int $worker_id){
    echo 'worker进程启动'.PHP_EOL;
    echo 'worker进程pid:'.$serv->worker_pid.PHP_EOL;
    echo 'worker进程id:'.$serv->worker_id.PHP_EOL;

    if($serv->taskworker){
        echo '当前进程号'.$serv->worker_id.",是task进程".PHP_EOL;
    }else{
        echo '当前进程号'.$serv->worker_id.",是worker进程".PHP_EOL;
    }

    echo '当前进程是：'.$worker_id.PHP_EOL;



});

$serv->on("shutdown",function(swoole_server $server){

    echo 'swoole shutdown';
});

$serv->on("workerstop",function(swoole_server $serv, int $worker_id){

    echo '当前进程'.$worker_id."停止了".PHP_EOL;
});


$serv->on("Connect",function(swoole_server $serv, $fd, $reactorId){

    echo '有个家伙连接进来了'.PHP_EOL;
    echo '它的fd是:'.$fd.PHP_EOL;
    echo '线程id是:'.$reactorId.PHP_EOL;
});

$serv->on("close",function(swoole_server $serv, $fd, $reactorId){

    echo '有个家伙离开了'.PHP_EOL;
    echo '离开的fd是:'.$fd.PHP_EOL;
    echo '它是从线程：'.$reactorId."过来的".PHP_EOL;
});


$serv->on('bufferfull', function (swoole_server $serv, $fd){
    echo '发送缓冲区的数据已经满了';
});

$serv->on('bufferempty', function (swoole_server $serv, $fd){
    echo '发送缓冲区有足够的空间';
});

$serv->on("task",function(swoole_server $serv, $task_id, $src_worker_id, $data){

    echo '任务触发'.PHP_EOL;
    echo '任务id:'.$task_id.PHP_EOL;
    echo '来自worker进程：'.$src_worker_id.PHP_EOL;
    echo '数据是：'.$data.PHP_EOL;

    echo '数据处理完毕';

    $serv->finish($task_id.'任务处理完毕');

});

$serv->on("finish",function(swoole_server $serv, $task_id,$data){

    echo '任务处理完成'.PHP_EOL;
    echo '任务id:'.$task_id.PHP_EOL;
    echo '数据：'.$data.PHP_EOL;

});

//监听数据接收事件
$serv->on('receive', function (swoole_server $serv, $fd, $from_id, $data) {
    //$serv->send($fd, "Server: ".$data);
    echo '收到客户端的数据，目前连接数是：'.count($serv->connections).PHP_EOL;

    //$web = file_get_contents("http://www.taobao.com");
    //$serv->send($fd,$web);

    $serv->task($data);

});
//启动服务器
$serv->start();