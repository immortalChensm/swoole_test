<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/4
 * Time: 17:50
 */

echo "获取所有协程列表".PHP_EOL;

go(function (){
    echo Co::getuid().PHP_EOL;
});

go(function (){
    echo Co::getuid().PHP_EOL;
});

go(function (){
    echo Co::getuid().PHP_EOL;
});

$list = Co::listCoroutines();
print_r($list);

foreach($list as $cid){
    print_r(Co::getBackTrace($cid));
}