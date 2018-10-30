<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/28
 * Time: 14:46
 */

echo "exec";

go(function (){
    print_r(swoole_coroutine_exec("pstree -ap |grep nginx"));
});

echo "end";