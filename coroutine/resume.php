<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/4
 * Time: 16:57
 */

echo "1".PHP_EOL;

$id = go(function(){
    $id = Co::getuid();

    echo "11".PHP_EOL;

    Co::suspend($id);

    echo "22".PHP_EOL;

    Co::suspend($id);

    echo "33".PHP_EOL;
});

echo "2".PHP_EOL;
Co::resume($id);
echo "3".PHP_EOL;
Co::resume($id);
echo "4".PHP_EOL;