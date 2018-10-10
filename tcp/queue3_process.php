<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/24
 * Time: 15:26
 */

$process_pool = [];
$write = new swoole_process("write",false,false);
$write->useQueue();
$write->name("php:write_process");
$write->start();
$w_pid = $write->pid;
$process_pool[$w_pid] = $write;

$read = new swoole_process("read",false,false);
$read->useQueue();
$read->name("php:read_process");
$read->start();

$r_pid = $read->pid;
$process_pool[$r_pid] = $read;

echo '主进程启动'.PHP_EOL;

function write(swoole_process $write)
{
    echo '写进程启动'.$write->pid.PHP_EOL;
    while(1){
        $data = fgets(STDIN);
        if($data){
            echo '写进程往子进程写数据'.PHP_EOL;
            $write->push($data);
            print_r($write->statQueue());
            if($data=='close'){
                $write->exit(0);
                break;
            }
        }
    }
}

function read(swoole_process $read){
    echo '读进程启动'.$read->pid.PHP_EOL;
    while(1){
        //先查看列队里的任务
        print_r($read->statQueue());
        if($read->statQueue()['queue_num']==0){
            //清除列队
            //$read->freeQueue();
            //echo '清除了列队'.PHP_EOL;
        }
        sleep(2);
        $data = $read->pop();
        if($data){
            echo '读进程读取到列队里的数据了，数据是：'.$data.PHP_EOL;


            try{
                $result = @file_get_contents("http://123.56.12.53:2346?words=".$data);
            }catch (\Exception $e){
                //
            }


            if($data=='close'){
                //停止读进程
                echo '读进程'.$read->pid."将停止".PHP_EOL;
                $read->exit(0);
                break;
            }else{
                echo '不是close'.$data;
            }
        }
        sleep(1);
    }
}

//等等子进程结束　　
$ret1 = swoole_process::wait();
echo '子进程'.$ret1['pid'].'死掉了'.PHP_EOL;
if($process_pool[$ret1['pid']]){
    //只要某个进程死掉了，则停止所有的进程，不必再继续运行了
    unset($process_pool[$ret1['pid']]);
    foreach($process_pool as $k=>$process){
        $process->exit(0);
    }
}
$ret2 = swoole_process::wait();
echo '子进程'.$ret2['pid'].'死掉了'.PHP_EOL;
echo '主进程结束'.PHP_EOL;