<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/16
 * Time: 12:16
 */

echo 'run start'.PHP_EOL;

go(function(){

    Co::sleep(5);
    echo 'run me'.PHP_EOL;

    go(function(){

        echo 'run inner me'.PHP_EOL;

        Co::sleep(3);

        go(function(){

            echo 'after 3 seconds run me'.PHP_EOL;
        });
    });

});

echo 'run end'.PHP_EOL;