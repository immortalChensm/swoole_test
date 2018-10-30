<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/28
 * Time: 15:14
 */

class Myclient extends Swoole\Coroutine\Client
{
    public function run(Array $config)
    {
        go(function()use($config){
            if (!$this->connect($config['host'],$config['port'])){
                echo "连接错了{$this->errCode}";
            }

//            $redis = new Swoole\Coroutine\Redis();
//            $redis->connect("127.0.0.1",6379);
//            $data  = $redis->keys("*");
//            $this->send(json_encode($data));

            $mysql = new Co\Mysql();
            $mysql->connect([
                'host' => '127.0.0.1',
                'port' => 3306,
                'user' => 'root',
                'password' => '123456',
                'database' => 'swoole',
            ]);

            $this->send(json_encode($mysql->query("show tables")));
            echo $this->recv(8192);

            //$this->close();
        });

    }
}

(new Myclient(SWOOLE_SOCK_TCP))->run(['host'=>'0.0.0.0','port'=>9501]);