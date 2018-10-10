<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/24
 * Time: 11:42
 */

$process = new swoole_process('callback_function', true);
$process->name("php_read_process");

$write = new swoole_process('write',false);
$write->name("php_write_process");

$pid = $process->start();
$wpid = $write->start();

$data = $process->read();
print_r($data);
echo '写进程数据：'.PHP_EOL;
$write_data = $write->read();
//print_r($write_data);




function callback_function(swoole_process $worker)
{
    $result = $worker->exec('/usr/bin/vmstat',[]);
    $worker->write($result);
}

function write(swoole_process $worker)
{

    /**********************************/


    /**********************************/
    while (1){
        $data = fgets(STDIN);
        if($data){
            $cli = new swoole_http_client('127.0.0.1', 2346);
            $cli->setHeaders(['Trace-Id' => md5(time()),]);
            $cli->on('message', function ($_cli, $frame) {
                var_dump($frame);
            });

            $cli->upgrade('/', function ($cli) {
                echo $cli->body;
                $cli->push("hello world");
            });
            print_r('cmd:'.$data);
            $cli->push($data);
        }
        //$worker->write($data);

    }
}

swoole_process::wait();