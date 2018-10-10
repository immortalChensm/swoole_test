<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/7
 * Time: 11:06
 */
//tcp_coroutine_server socket协程服务
//协程特性：类似中断系统　　在运行时，先执行中断请求[中断断点]yield 挂起　中断处理完成后响应　　[中断响应]－－[中断返回]
//回到断点处继续向下运行　　支持next生成器

Co::create(function(){


    $server = new Swoole\Coroutine\Socket(AF_INET,SOCK_STREAM,IPPROTO_IP);

    $server->bind("0.0.0.0",9603);

    $server->listen(10);
    $conn = $server->accept();
//    while(1){
//
//        echo 'rece from client...'.PHP_EOL;
//        $data = $conn->recv();
//        $process = new swoole_process(function (swoole_process $process)use($conn,$data){
//
//            echo '来自客户端的数据是:'.$data.PHP_EOL;
//            $conn->send("your data is:".$data);
//
//        },false);
//        $pid = $process->start();
//        echo 'client processid is:'.$pid.PHP_EOL;
//        $ret = swoole_process::wait();
//        print_r($ret);
//    }


    $data = $conn->recv();
    $conn->send($data);
    echo 'main sock is running....'.PHP_EOL;
    echo $data.PHP_EOL;
    $conn->close();


});

