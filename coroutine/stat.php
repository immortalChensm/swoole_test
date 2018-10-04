<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/4
 * Time: 17:30
 */

echo "协程状态".PHP_EOL;

Co::create(function(){
    echo Co::getuid().PHP_EOL;
    print_r(Co::stats());
});

Co::create(function(){
    echo Co::getuid().PHP_EOL;
    print_r(Co::stats());
});

Co::create(function(){
    echo Co::getuid().PHP_EOL;
    print_r(Co::stats());
});
Co::create(function(){
    echo Co::getuid().PHP_EOL;
    print_r(Co::stats());
});
print_r(Co::stats());
echo "ending".PHP_EOL;