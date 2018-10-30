<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/28
 * Time: 15:02
 */

echo "stats";

go(function (){
    print_r(swoole_coroutine::stats());
});

echo "end";