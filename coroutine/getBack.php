<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/4
 * Time: 17:34
 */

echo "协程开始".PHP_EOL;

function test1()
{
    test2();
}

function test2()
{
    while(true){
        Co::sleep(10);
        echo __FUNCTION__.'\n';
    }
}

$cid = go(function(){
    test1();
});

Co::create(function()use($cid){

    echo Co::getuid().PHP_EOL;
    print_r(Co::getBackTrace($cid));
});

echo "ending".PHP_EOL;