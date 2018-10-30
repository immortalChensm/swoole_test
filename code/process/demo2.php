<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/29
 * Time: 22:14
 */

echo posix_getpid().PHP_EOL;
for ($i=0;$i<5;$i++){

    $pid = $process = new swoole_process(function (swoole_process $process)use($i){
        echo $i.PHP_EOL;
    });
    $process->start();
    print_r($pid);
    swoole_process::wait();
}