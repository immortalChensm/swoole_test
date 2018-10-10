<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/20
 * Time: 10:59
 */

namespace Model;

class Redis
{
    public function index()
    {
        $redis = new \Swoole\Coroutine\Redis();
        $redis->connect('127.0.0.1', 6379);
        $redis->auth("123456");
        //$val = $redis->keys('*');
    }
}