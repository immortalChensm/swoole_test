<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/31
 * Time: 21:43
 */

$table = new swoole_table(1024);
$table->column("id",swoole_table::TYPE_INT);
$table->column("name",swoole_table::TYPE_STRING,10);
$table->column("age",swoole_table::TYPE_FLOAT);
$table->create();

$table['tony'] = ['id'=>1,'name'=>'tony','age'=>200];
$table['tom'] = ['id'=>2,'name'=>'tom','age'=>1000];
$table['tom'] = ['id'=>2,'name'=>'tons','age'=>1000];

print_r($table->get('tom'));

