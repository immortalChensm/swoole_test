<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/30
 * Time: 9:34
 */


$a = 'test';

$b =  pack('N',strlen($a)).$a;

var_dump($b).PHP_EOL;

echo ord($b);

echo '原来的数据是：'.$a.PHP_EOL;

echo '原来的数据长度是：'.strlen($a).PHP_EOL;

echo 'pack打包之后得到的结果是：'.$b.PHP_EOL;

echo '该字符串的字节长度是：'.strlen($b).PHP_EOL;

echo '截取４个字节后的数据是：'.substr($b,4).PHP_EOL;

echo '截取４个字节后的数据－字节长度是：'.strlen(substr($b,4)).PHP_EOL;
