<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/16
 * Time: 12:25
 */

$id = go(function(){
    $id = Co::getuid();
    echo "my coroutine id is:".$id.PHP_EOL;

    Co::sleep(1);
    echo "after 1 second run me".PHP_EOL;

    Co::suspend($id);
    echo "suspend after run me!".PHP_EOL;

    Co::suspend($id);
    echo "suspend 2 after run me!".PHP_EOL;


});

echo "main process is start!".PHP_EOL;

Co::resume($id);

echo "resume after".PHP_EOL;

Co::resume($id);

echo "resume 2 after".PHP_EOL;