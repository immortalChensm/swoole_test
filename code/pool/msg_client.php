<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/31
 * Time: 20:47
 */

$client = new Swoole\MsgQueue(0x00001);

for ($i=0;$i<20;$i++){

    sleep(1);
    var_dump($client->stats());
    $client->push('hello'.$i);
}