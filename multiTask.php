<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/3
 * Time: 12:33
 */

$server = new swoole_server("0.0.0.0",2346);
$server->set([
    'task_worker_num'=>5,

]);
$server->on("receive",function (swoole_server $server,$fd,$reactorid,$data){

    echo "data:".$data.PHP_EOL;
    $server->task($data,1);
    if(trim($data) == 'multi'){
       $result = $server->taskWaitMulti([1,2,3,4,5],0.5);
       print_r($result);
    }
});

$server->on("task",function(swoole_server $server,$taskid,$src_workerid,$data){

    if(is_array($data)){
        foreach($data as $id){
            echo "task数组事件：".$id.PHP_EOL;
            $server->finish($id);
        }


    }else{
        echo "task事件：taskid:".$taskid.PHP_EOL;
        echo "task事件：src_workerid:".$src_workerid.PHP_EOL;
        echo "task事件：data:".$data.PHP_EOL;

        return "ok";
    }

});

$server->on("finish",function(swoole_server $server,$taskid,$data){

    echo "finish事件：taskid:".$taskid.PHP_EOL;
    echo "finish事件：data:".$data.PHP_EOL;
    
});

$server->start();