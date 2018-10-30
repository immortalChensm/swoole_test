<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/30
 * Time: 20:56
 */


function product(swoole_process $process){
    foreach(range('a','z') as $alpha){
        $process->push($alpha);
    }

    $process->freeQueue();
}

function consumer(swoole_process $process){
    while($msg = $process->pop()){
        if ($msg == false){
            break;
        }
        echo "workerd[".$process->pid.']'.$msg.PHP_EOL;

    }
    $process->exit(0);
}
echo "主进程[".posix_getpid().']启动'.PHP_EOL;
$product = new swoole_process('product',false);
$product->useQueue();
$pid = $product->start();

$consumer = new swoole_process('consumer',false);
$consumer->useQueue();
$cid = $consumer->start();

echo "生产者进程启动".$pid.PHP_EOL;
echo "消费者进程启动".$cid.PHP_EOL;


(new swoole_process(function(swoole_process $process){
    $process->useQueue();
    while($msg = $process->pop()){
        if ($msg == false){
            break;
        }
        echo "another 进程['.$process->pid.']读取".$msg.PHP_EOL;
    }
    $process->exit(0);
}))->start();

swoole_process::wait();
swoole_process::wait();
swoole_process::wait();

