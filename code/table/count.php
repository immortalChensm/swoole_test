<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/31
 * Time: 21:58
 */

$table = new swoole_table(10);

$table->column("id",swoole_table::TYPE_INT);
$table->column("name",swoole_table::TYPE_STRING,30);

$table->create();

for ($i=0;$i<10;$i++){
    $table->incr($i,'id',$i);
    $table[$i]['name'] = $i;
}

for ($i=0;$i<10;$i++){
    if ($table->exist($i)){
        echo $table[$i]['name'].PHP_EOL;
    }
}

echo $table->count();