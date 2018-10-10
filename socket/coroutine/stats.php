<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/16
 * Time: 20:07
 */
Swoole\Coroutine::set([
    "max_coroutine"=>2
]);


go(function(){

//    $stats = Co::stats();
//    print_r($stats);

    echo "1".PHP_EOL;
});

go(function(){

//    $stats = Co::stats();
//    print_r($stats);
    echo "2".PHP_EOL;
});

go(function(){

//    $stats = Co::stats();
//    print_r($stats);
    echo "3".PHP_EOL;
});

for($i=0;$i<50000;$i++){
    go(function()use($i){
        echo $i.PHP_EOL;
    });
}
