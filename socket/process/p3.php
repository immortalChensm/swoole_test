<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/18
 * Time: 18:40
 */

function callback(swoole_process $process){

    swoole_timer_after(10000,function()use($process){
        //echo "hello,world".PHP_EOL;
        $process->write(date("Y-m-d H:i:s"));
    });

}
//https://wiki.swoole.com/wiki/page/158.html
//SIGCHLD	子进程状态改变  信号
//见linux网络编程一书之 信号
//信号由 系统，用户，进程向目标进程发送的一个信号
//发起信号可用kill
swoole_process::signal(SIGCHLD,function($sig){
    while($ret=swoole_process::wait(false)){
        $p = new swoole_process("callback");
        $p->start();
    }

    echo "已经监听到子进程的状态发生了变化：".$sig.PHP_EOL;
});

swoole_timer_tick(1000,function(){
    echo "主进程定时器:".date("YmdH-i-s").PHP_EOL;
});
//$process = new swoole_process("callback");
$process = new Swoole\Process("callback",true);


swoole_event_add($process->pipe,function($pipe)use($process){
    echo "该进程的可读事件已经就绪".PHP_EOL;
    echo $process->read();
});

$process->start();

