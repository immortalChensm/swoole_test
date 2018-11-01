<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/31
 * Time: 21:31
 */

$buffer = new swoole_buffer();

$buffer->write(0,'hello');
$buffer->write(10,'world');

echo $buffer->read(0,3);
echo $buffer->read(6,8);
$buffer->clear();