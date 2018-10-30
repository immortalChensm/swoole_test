<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/30
 * Time: 21:08
 */
echo "masterid".posix_getpid().PHP_EOL;

$process = new swoole_process(function(swoole_process $process){

    $process->write("hi,swoole");
},true);

echo $process->start().PHP_EOL;
echo $process->read().PHP_EOL;
//echo $process->close().PHP_EOL;
echo $process->read().PHP_EOL;

