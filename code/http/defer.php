<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/29
 * Time: 20:45
 */
go(function(){

    $clientList = [];
    for ($i=0;$i<5;$i++){
        $cli = new Swoole\Coroutine\Http\Client(swoole_coroutine::gethostbyname("www.easyswoole.com"),80);

        $cli->setHeaders([
            'user-agent'=>'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36',
        ]);
        $cli->setDefer();
        $cli->get("/api/test");

        $clientList[] = $cli;
    }

    for ($i=0;$i<5;$i++){
        $clientList[$i]->recv();
        $r = $clientList[$i]->body;
        print_r($r);
    }
});