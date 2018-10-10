<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/19
 * Time: 14:57
 */

namespace HttpController;

use Model\Redis;

class User extends Controller
{
    public function index()
    {
        $this->getResponse()->end('<h2>这里是用户首页!</h2>');
    }

    public function add()
    {
        sleep(30);
        $this->getResponse()->end(json_encode($this->request->server));
    }

    public function test()
    {
        $this->getResponse()->end("hello,swoole");
    }

    public function get()
    {
        $db = new \swoole_mysql();
        $server = array(
            'host' => '127.0.0.1',
            'port' => 3306,
            'user' => 'root',
            'password' => '123456',
            'database' => 'sw',
            'charset' => 'utf8', //指定字符集
            'timeout' => 10,  // 可选：连接超时时间（非查询超时时间），默认为SW_MYSQL_CONNECT_TIMEOUT（1.0）
        );
        $response = $this->getResponse();

        $db->connect($server, function (\swoole_mysql $db, $r)use($response){
            if ($r === false) {
                var_dump($db->connect_errno, $db->connect_error);
                die;
            }
            $sql = 'show tables';
            $db->query($sql, function(\swoole_mysql $db, $r)use($response) {
                if ($r === false)
                {
                    var_dump($db->error, $db->errno);
                }
                elseif ($r === true )
                {
                    var_dump($db->affected_rows, $db->insert_id);
                }
                var_dump($r);
                $response->end(json_encode($r));
                $db->close();
            });
        });
    }

    public function gettable()
    {
        $swoole_mysql = new \Swoole\Coroutine\MySQL();
        $swoole_mysql->connect([
            'host' => '127.0.0.1',
            'port' => 3306,
            'user' => 'root',
            'password' => '123456',
            'database' => 'sw',
        ]);
        $res = $swoole_mysql->query('select database();');
        $this->response->end(json_encode($res));
    }

    public function socket()
    {

        /*go(function () use ($socket,$response) {
            while(true) {
                echo "Accept: \n";
                $client = $socket->accept();
                if ($client === false) {
                    var_dump($socket->errCode);
                } else {
                    var_dump($client);
                    $data = $client->recv();
                    echo $data;

                    $client->send($data);
                }


            }
        });*/



        $response = $this->getResponse();


        $process = new \swoole_process(function(\swoole_process $process)use($response){

            $socket = new \Co\Socket(AF_INET, SOCK_STREAM, 0);
            $socket->bind('127.0.0.1', 9601);
            $socket->listen(128);

            go(function () use ($socket,$response) {
                //while(true) {
                    echo "Accept: \n";
                    $client = $socket->accept();

                    $s = $client->recv();
                    print_r($s);

                    $client->send($s);

                    echo date("Ymdhis").PHP_EOL;

                //}
            });


        },false);

        $pid = $process->start();

        $response->end("socket服务已经启动了，进程号为".$pid);

    }

    public function redis()
    {

        $redis = new \Swoole\Coroutine\Redis();
        $redis->connect('127.0.0.1', 6379);
        $redis->auth("123456");
        //$val = $redis->keys('*');

        $R = new Redis();
        echo $R->index();
        $this->getResponse()->end(json_encode($R->index()));
    }

    public function getA()
    {
        //处理http协程客户端发过来的请求
        $data = $this->getRequest()->get;

        //print_r($data);
        echo "get包：".PHP_EOL;
        print_r($this->getRequest()->get);
        echo "post：".PHP_EOL;
        print_r($this->getRequest()->post);
//        echo "header：".PHP_EOL;
//        print_r($this->getRequest()->header);
//        echo "server：".PHP_EOL;
        print_r($this->getRequest()->server);
//        echo "cookie：".PHP_EOL;
        print_r($this->getRequest()->cookie);
        echo "rawContent：".PHP_EOL;
        print_r($this->getRequest()->rawContent());
        echo "getData：".PHP_EOL;
        print_r($this->getRequest()->getData());
//        echo "files：".PHP_EOL;
        print_r($this->getRequest()->files);


        $this->getResponse()->end(json_encode($this->getRequest()->rawContent()));
    }
}