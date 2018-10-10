<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/16
 * Time: 20:02
 */
echo "1".PHP_EOL;
Co::create(function(){

    $result = Co::exec("ls -al");
    print_r($result);

});

echo "2".PHP_EOL;