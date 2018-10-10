<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/20
 * Time: 11:13
 */

namespace Model;

class Model
{
    protected $redis = null;
    /**
    swoole的协程redis
     **/
    public function getRedis()
    {
        $this->redis = new \Swoole\Coroutine\Redis();
        $this->redis->connect('127.0.0.1', 6379);
        $this->redis->auth("123456");
        $this->redis->select(1);

        return $this->redis;
    }

    /**
    原生redis
     **/
    protected function getNativeRedis()
    {
        $redis = new \Redis();
        $redis->connect("127.0.0.1",6379);
        $redis->auth("123456");
        $redis->select(1);
        return $redis;
    }
}