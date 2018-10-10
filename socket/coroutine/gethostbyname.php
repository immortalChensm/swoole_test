<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/16
 * Time: 19:59
 */

go(function(){

    //$ip = Co::getHostByName("www.itkucode.com");
    //echo $ip;

    $ip = Co::getAddrInfo("www.baidu.com");
    print_r($ip);
});