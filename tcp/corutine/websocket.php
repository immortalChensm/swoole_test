<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/24
 * Time: 17:41
 */

go(function () {
    $cli = new Co\http\Client("127.0.0.1", 2346);
    $ret = $cli->upgrade("/");
    if ($ret) {
//        while(true) {
//            $cli->push("hello");
//            var_dump($cli->recv());
//            co::sleep(0.1);
//        }

        $cli->push("hello");
        var_dump($cli->recv());
        co::sleep(0.1);

    }

    while(1){
        $data = fgets(STDIN);
        if($data){
            $cli->push($data);
        }
    }
});

