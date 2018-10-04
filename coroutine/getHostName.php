<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/4
 * Time: 17:20
 */

echo "1".PHP_EOL;

Co::create(function(){

    echo Co::getuid().PHP_EOL;
    //print_r(Co::getHostByName("www.baidu.com"));
   // print_r(Co::getAddrInfo("www.itkucode.com"));

    //print_r(Co::exec("uname"));
    //echo Co::exec("");
    print_r(Co::readFile("co.php"));
});

echo "2".PHP_EOL;