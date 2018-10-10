<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/25
 * Time: 15:35
 */

pcntl_signal(SIGCHLD, SIG_IGN); //如果父进程不关心子进程什么时候结束,子进程结束后，内核会回收。

$pid_dir = __dir__."/pid_files";

for($i=0; $i<3; $i++){
    $pid = pcntl_fork(); //创建子进程
    if($pid == -1){
        //错误处理：创建子进程失败时返回-1.
        var_dump("fork failed");
    }
    if(!$pid){
        //子进程得到的$pid为0, 所以这里是子进程执行的逻辑。
        //子进程代码
        $pid = posix_getpid();
        $ppid = posix_getppid();
        $r = rand(0,100);  //随机数
        touch("$pid_dir/fork_child_process_{$i}_{$ppid}_{$pid}_{$r}");
        exit;
    }else{
        //父进程会得到子进程号，所以这里是父进程执行的逻辑
        //如果不需要阻塞进程，而又想得到子进程的退出状态，则可以注释掉pcntl_wait($status)语句，或写成：
        pcntl_wait($status,WNOHANG); //等待子进程中断，防止子进程成为僵尸进程。
    }
}
$pid = posix_getpid();
$ppid = posix_getppid();
$r = rand(0,100); //随机数
touch("$pid_dir/fork_process_pid_{$ppid}_{$pid}_$r");