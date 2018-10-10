<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/19
 * Time: 12:17
 */

$p1 = new swoole_process(function(swoole_process $p1){

    for($i=0;$i<10;$i++){
        echo $p1->pop().PHP_EOL;
    }
});
$p1->useQueue();
$p1->start();

for($i=0;$i<10;$i++){
    sleep(1);
    $p1->push($i);
}

swoole_process::wait();