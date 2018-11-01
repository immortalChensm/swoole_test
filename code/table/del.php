<?php
/**
 * Created by PhpStorm.
 * User:jackcsm
 * qq:1655664358@qq.com
 * Date: 2018/10/31
 * Time: 22:08
 */

$table = new swoole_table(10);
$table->column("id",swoole_table::TYPE_INT);
$table->column("name",swoole_table::TYPE_STRING,50);

$table->create();

$server = new swoole_server("0.0.0.0",2346);

$server->on("receive",function (swoole_server $server,$fd,$reactorId,$data)use($table){

    $table[1]['id'] = 1;
    $table[1]['name'] = $data;

    //echo "1:".$table->get(1)['name'].PHP_EOL;
    //echo "2:".json_encode($table->get(1)).PHP_EOL;

    $server->send($fd,$table[1]['name']);
//    if (trim($data) == 'get'){
//        $server->send($fd,json_encode($table->get(1)));
//    }elseif(trim($data) == 'del'){
//        $table->del(1);
//        $server->send($fd,'del ok');
//    }

//    $server->send($fd,'set ok');
});

$server->start();