<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/25
 * Time: 15:21
 */

echo '主进程开始运行'.posix_getgid().PHP_EOL;

$pid = pcntl_fork();

echo '子进程的id'.$pid.PHP_EOL;

sleep(2);

echo system("pstree -ap|grep php");