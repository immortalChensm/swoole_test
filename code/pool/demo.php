<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/30
 * Time: 22:46
 */

$process = new Swoole\Process\Pool(2);

$process->on("Workerstart",function (Swoole\Process\Pool $pool,$worker){
    echo "start".$worker.PHP_EOL;
});

$process->on("Workerstop",function(Swoole\Process\Pool $pool,$workerid){
    echo "stop workerid[".$workerid.']'.PHP_EOL;
});

$process->start();