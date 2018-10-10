<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/24
 * Time: 16:59
 */

(new class{

    protected $cli = null;
    public function __construct()
    {
        $this->cli = new swoole_http_client('127.0.0.1', 2346);
        $this->cli->on('message', [$this,'message']);
        $this->cli->upgrade('/',[$this,'send']);
        $process = new swoole_process([$this,'run'],true);
        //$process->start();
//        $pid = $process->pid;
//        while(1){
//            $data = $process->read();
//            if($data){
//                echo $data.PHP_EOL;
//                //$cli->push($data);
//            }
//        }

        //swoole_process::wait();
    }

    public function run(swoole_process $process)
    {
        while(1){
            $data = fgets(STDIN);
            if($data){
                $process->write($data);
            }
        }
    }

    public function message($_cli, $frame)
    {
        var_dump($frame);
    }

    public function send($cli)
    {


        while(1){
            echo $cli->body;
            $cli->push("hello world");
        }


    }

});
