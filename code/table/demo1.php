<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/31
 * Time: 21:50
 */

$table = new swoole_table(10);

$table->column("id",swoole_table::TYPE_INT);
$table->column('name',swoole_table::TYPE_STRING,10);
$table->create();

$table->set(1,['id'=>1,'name'=>'jack']);
print_r($table->get(1));

echo $table[1]['name'];