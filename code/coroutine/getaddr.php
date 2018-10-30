<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/28
 * Time: 14:44
 */

echo "getaddr";

go(function (){
    print_r(swoole_coroutine::getaddrinfo("www.baidu.com"));
});

echo "end";