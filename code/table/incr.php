<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/31
 * Time: 21:55
 */

$table = new swoole_table(10);

$table->column("id",swoole_table::TYPE_INT);
$table->column("name",swoole_table::TYPE_STRING,20);
$table->create();

$table->incr(1,'id',1);
$table[1]['name'] = 'tom';
$table->incr(2,'id',2);
$table[2]['name'] = 'jack';

if ($table->exist(2)){
    echo $table[2]['name'];
}