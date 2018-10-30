<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/28
 * Time: 14:41
 */

echo "眨眼";

go(function (){

    swoole_coroutine::sleep(5);
    echo "wait 5 seconds run me";
});

echo "end";