<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/18
 * Time: 11:39
 */

go(function (){
    $ws = new Swoole\Coroutine\Http\Client("127.0.0.1",2346);

    $ret = $ws->upgrade("/");
    print_r($ret);

    $ws->push("hi,swoole");
    $data = $ws->recv();
    print_r($data);

});

