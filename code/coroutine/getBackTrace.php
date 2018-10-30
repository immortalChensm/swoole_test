<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/28
 * Time: 15:03
 */

echo "getbacktrace";

go(function (){

    print_r(swoole_coroutine::getBackTrace(swoole_coroutine::getuid()));
});

echo "end";