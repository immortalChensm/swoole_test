<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/30
 * Time: 22:15
 */

swoole_process::signal(SIGALRM,function ($signo){

    static $i;
    $i++;
    if ($i>20){
        swoole_process::alarm(-1);
        swoole_process::kill(posix_getpid(),SIGKILL);
    }else{
        echo $i.PHP_EOL;
        echo date("YmdHis");
    }
});
//1s=1000ms
//1ms=1000us
swoole_process::alarm(1000*1000);