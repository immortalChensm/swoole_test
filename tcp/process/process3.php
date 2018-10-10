<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/24
 * Time: 13:53
 */

function write($worker){
    while(1){

        $data = fgets(STDIN);
        if($data){
            $worker->write($data);

            //发起http请求触发ws 服务
            $url = "http://127.0.0.1:2346?words=".$data;
            $result = file_get_contents($url);
            $worker->write($result);
        }
    }
}


$p1 = new swoole_process('read',true);
$p1->name("php:read:process");
//$p1->setBlocking(false);
$p1->setTimeout(1.5);
$p1_pid = $p1->start();

echo '主进程启动'.posix_getegid().PHP_EOL;

if($result = $p1->read()){
    echo $result;
}else{
    echo swoole_strerror(swoole_errno());
}
print_r("来自websocket的响应是".$result);
function read(swoole_process $worker){
    //write($worker);
    //$worker->write("hi");
    //while(1){

        $data = 'jackma';
        //$url = "http://127.0.0.1:2346?words={$data}";
        //$result = file_get_contents($url);
        sleep(5);
        $worker->write($data);
    //}



}
swoole_process::wait();
echo '主进程结束了';