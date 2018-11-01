<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/31
 * Time: 21:26
 */

$buffer = new swoole_buffer();

$buffer->append(str_repeat('A',10));

print_r($buffer);

echo $buffer->substr(0,5,true);
echo $buffer->substr(0,5,true);

$buffer->clear();
echo $buffer->substr(0,10);