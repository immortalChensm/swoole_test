<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/25
 * Time: 15:41
 */

pcntl_signal(SIGCHLD,SIG_IGN);

echo '主进程启动'.posix_getgid();

for($i=0;$i<3;$i++){

    $pid = pcntl_fork();
    if(!$pid){
        $ppid = posix_getppid();
        $pid = posix_getgid();
        echo '子进程启动'.$pid.PHP_EOL;
        echo rand(1,100);


        exit();
    }

    echo '子进程结束'.posix_getpid().PHP_EOL;
    pcntl_wait($status,WNOHANG);

}

echo '主进程结束'.posix_getgid();

