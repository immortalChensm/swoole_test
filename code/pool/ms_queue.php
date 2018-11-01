<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/31
 * Time: 20:37
 */

/**
$ipc_type 进程间通信的模式，默认为0表示不使用任何进程间通信特性
设置为0时必须设置onWorkerStart回调，并且必须在onWorkerStart中实现循环逻辑，当onWorkerStart函数退出时工作进程会立即退出


设置为SWOOLE_IPC_MSGQUEUE表示使用系统消息队列通信，可设置$msgqueue_key指定消息队列的KEY，未设置消息队列KEY，将申请私有队列
必须设置onMessage回调，onWorkerStart变更为可选

设置为SWOOLE_IPC_SOCKET表示使用Socket进行通信，需要使用listen方法指定监听的地址和端口
使用非0设置时，必须设置onMessage回调，onWorkerStart变更为可选
 **/
$pool = new Swoole\Process\Pool(2,SWOOLE_IPC_MSGQUEUE,0x00001);

$pool->on("message",function (Swoole\Process\Pool $pool,$msg){
    echo "msg:".$msg.PHP_EOL;
});

$pool->on("WorkerStart",function(Swoole\Process\Pool $pool,$workerId){
    echo "workerid[".$workerId.'] start'.PHP_EOL;
});

$pool->on("WorkerStop",function(Swoole\Process\Pool $pool,$workerId){
    echo "workerid[".$workerId.'] stop'.PHP_EOL;
});

$pool->start();