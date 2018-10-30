<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/28
 * Time: 14:43
 */

echo "解析ip";

go(function (){
    print_r(swoole_coroutine::gethostbyname("www.baidu.com"));
});

echo "end";