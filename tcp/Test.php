<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/5
 * Time: 21:09
 */

class Test
{
    private static $instacne;

    public static function getInstance()
    {
        return new self();
    }

    public function onConnect(swoole_server $connect,$fd)
    {
        echo 'ok';
    }
}