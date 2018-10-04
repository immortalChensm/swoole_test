<<<<<<< HEAD
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/2
 * Time: 12:28
 */
$server = new swoole_server("0.0.0.0",2346);

$server->set([
    'buffer_high_watermark'=>16,
    'buffer_low_watermark'=>8,
    'worker_num'=>2,
    'task_worker_num'=>3
]);
$server->on("connect",function (swoole_server $swoole_server,$fd,$reactorId){
    echo "connect fd:".$fd.PHP_EOL;
});
$server->on("receive",function(swoole_server $swoole_server,$fd,$reactorId,$data){
    echo "receive data:".$data.PHP_EOL;

    $swoole_server->task($data,1);


    $swoole_server->sendfile($fd,"client1.php");
});

$server->on("BufferFull",function(swoole_server $server,$fd){
    echo "buffer is full".PHP_EOL;
    $server->close($fd);
});

$server->on("task",function(swoole_server $server,$task_id,$src_workerid,$data){
    echo "task_id:".$task_id.PHP_EOL;
    echo "src_workerid:".$src_workerid.PHP_EOL;
    echo "data:".$data.PHP_EOL;


    $server->finish("task is over");
});

$server->on("finish",function(swoole_server $server,$task_id,$data){
    echo "task_id:".$task_id.PHP_EOL;
    echo "data:".$data.PHP_EOL;
});

$server->on("workerStart",function(swoole_server $server,$workerid){
    if($server->taskworker){
        echo "当前进程是task进程：".$server->worker_pid.",taskid:".$workerid.PHP_EOL;
    }else{
        echo "当前进程是worker进程：".$server->worker_pid.",worker_id:".$server->worker_id.PHP_EOL;
    }
});

$server->on("BufferEmpty",function(swoole_server $server,$fd){
    echo "buffer is empty";
});

$server->on("close",function(swoole_server $swoole_server,$fd,$reactorId){

});

=======
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/2
 * Time: 12:28
 */
$server = new swoole_server("0.0.0.0",2346);

$server->set([
    'buffer_high_watermark'=>8
]);
$server->on("connect",function (swoole_server $swoole_server,$fd,$reactorId){
    echo "connect fd:".$fd.PHP_EOL;
});
$server->on("receive",function(swoole_server $swoole_server,$fd,$reactorId,$data){
    echo "receive data:".$data.PHP_EOL;
    $post = file_get_contents("http://www.baidu.com");
    for($i=0;$i<1000;$i++){

        $swoole_server->send($fd,$post);
    }
});

$server->on("BufferFull",function(swoole_server $server,$fd){
    echo "buffer is full".PHP_EOL;
    $server->close($fd);
});
$server->on("close",function(swoole_server $swoole_server,$fd,$reactorId){

});

>>>>>>> 38ba181d7c6dbe8f15472e0b3774dfac91e9f5e8
$server->start();