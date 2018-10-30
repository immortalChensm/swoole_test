<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/30
 * Time: 20:40
 */

$pid = posix_getpid();
echo '主进程启动'.$pid.PHP_EOL;

function product(swoole_process $process){
    foreach(range(0,10) as $item){
        $process->push($item);
    }

    print_r($process->statQueue());
}

function consumer(swoole_process $process){
    while($msg = $process->pop()){
        if ($msg == false){
            break;
        }

        echo 'workerid['.$process->pid.']'.$msg.PHP_EOL;
    }
    $process->exit(0);
}

$product = new swoole_process('product');
$product->useQueue(1,2|swoole_process::IPC_NOWAIT);
$consumer = new swoole_process('consumer');
$consumer->useQueue(1,2|swoole_process::IPC_NOWAIT);

$productid = $product->start();
$consumerid = $consumer->start();

echo "生产者进程启动".PHP_EOL;
print_r($productid);
echo "消费者进程启动".PHP_EOL;
print_r($consumerid);


swoole_process::wait();
swoole_process::wait();