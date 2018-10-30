<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/30
 * Time: 21:56
 */

$process = new swoole_process(function(swoole_process $process){
    while(true){
        $process->write(str_repeat(range('a','z')[0],10));
    }

});



$pid = $process->start();
echo $pid.PHP_EOL;

swoole_process::signal(SIGTERM,function($signo){
    echo 'shutdown'.PHP_EOL;
});

swoole_process::signal(SIGQUIT,function($signo){
    echo 'quit'.PHP_EOL;
    swoole_process::kill(posix_getpid(),SIGTERM);
});


//swoole_process::kill(posix_getpid(),SIGTERM);
echo $process->read().PHP_EOL;