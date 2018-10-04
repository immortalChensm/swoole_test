<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/4
 * Time: 16:55
 */

echo "1".PHP_EOL;
for($i=0;$i<100;$i++){
    go(function()use($i){
        echo '$i='.$i.PHP_EOL;
        echo Co::getuid().PHP_EOL;
    });
}

echo "2".PHP_EOL;