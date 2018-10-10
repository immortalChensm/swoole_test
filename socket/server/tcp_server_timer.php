<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/14
 * Time: 17:07
 */

$serv = new swoole_server("127.0.0.1",9501,SWOOLE_BASE,SWOOLE_SOCK_TCP);

$serv->set([
    "reactor_num"=>4,
    "worker_num"=>5
]);


$serv->on("connect",function(swoole_server $serv,$fd,$reactorId){
    echo $fd.'connect!'.PHP_EOL;

//    $serv->timerId = $serv->tick(1000,function(){
//        echo date("Ymdhis").PHP_EOL;
//
//    });
});

$serv->on("receive",function (swoole_server $serv,$fd,$reactorId,$data){

    //$serv->send($fd,"hi,your data is:".$data);
    $serv->sendwait($fd,"hi,now running mode is base");

//    //文件发送
//    swoole_timer_after(1000,function($user_param){
//        $serv = $user_param[0];
//        $fd = $user_param[1];
//        $file = __DIR__."/tcp_server.php";
//        $serv->sendfile($fd,$file,0,200);
//    },[$serv,$fd]);

//    $serv->tick(1000,function ()use($serv,$fd,$data){
//        $serv->send($fd,date("Ymdhis").'==='.$data);
//    });

//    $serv->tick(100,function ()use($serv,$fd,$data){
//        echo '100毫秒执行一次'.PHP_EOL;
//        $serv->send($fd,microtime().'==='.$data);
//    });

//    $serv->after(3000,function ()use($serv,$fd,$data){
//        echo '3秒钟后执行我'.PHP_EOL;
//        $serv->send($fd,$data);
//    });

//      swoole_timer_after(3000,function()use($serv,$fd,$data){
//                  echo '3秒钟后执行我'.PHP_EOL;
//                  $serv->send($fd,$data);
//      });

//    if(trim($data)=='stop'){
//        echo '清除定时器'.PHP_EOL;
//        $serv->clearTimer($serv->timerId);
//    }

//    //过一伙运行我
//    $serv->defer(function()use($serv){
//        list($a,$b,$c) = [1,2,3];
//        call_user_func(function($a){
//            print_r($a);
//        },$a,$b,$c);
//    });
});

$serv->on("close",function(swoole_server $serv,$fd,$reactorId){
    echo $fd.'close!'.PHP_EOL;
});

$serv->start();