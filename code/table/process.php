<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/31
 * Time: 22:32
 */


$table = new swoole_table(10);
$table->column("id",swoole_table::TYPE_INT);
$table->column("name",swoole_table::TYPE_STRING,50);

$table->create();

$table[1]['name'] = 'jack';
$process = new swoole_process(function(swoole_process $process)use($table){
    //$process->write(json_encode($table->get(1)));
    $process->write(json_encode($table[1]));
},true);

$pid = $process->start();

print_r($process->read());