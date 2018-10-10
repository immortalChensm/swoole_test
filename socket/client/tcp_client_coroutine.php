<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 17:39
 */
/**
go(function(){

})
Co::create()
Swoole\Coroutine::create()
 **/
go(function(){
    $client = new Swoole\Coroutine\Client(SWOOLE_SOCK_TCP|SWOOLE_SSL);

    $client->connect("127.0.0.1",2346);

    $client->send("nihao,dalao");

    $process = new swoole_process(function(swoole_process $process)use($client){

        $data = $client->recv();
        print_r($data);
        while(1){


            $msg = fgets(STDIN);
            if($msg){
                $client->send($msg);
            }
        }
    },false);
    $process->start();





    //$client->close();
});
