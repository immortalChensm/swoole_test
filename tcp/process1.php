<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/24
 * Time: 10:56
 */

(new class
{
    public function __construct()
    {
        //创建进程
        //$read_process = new swoole_process([$this,'read'],true);
        $write_process = new swoole_process([$this,'write'],true);

        //启动进程


        //$r_pid = $read_process->start();
        $w_pid = $write_process->start();

        $this->waitProcess();

        echo '主进程启动'.posix_getegid();

       // while(1){
            $data = $write_process->read();
            echo '写进程的写数据是：'.$data.PHP_EOL;
        //}

        //$read_process->write($data);

        //$read_data = $read_process->read();
       // echo '读进程的读数据是：'.$read_data.PHP_EOL;
    }

    public function write(swoole_process $write_process)
    {
//            while(1){
//                $data = fgets(STDIN);
//                $write_process->write($data);
//                echo '你输入的数据是:'.$data.PHP_EOL;
//            }

        $data = 'write data';
        $write_process->write($data);


    }
    public function read(swoole_process $read_process)
    {
//        for($i=0;$i<100;$i++){
//            echo $i.PHP_EOL;
//        }

       // $result = $process->exec("/usr/bin/vmstat",[]);
        //print_r($result);

            //print_r($process->read());

                $data = $read_process->read();
                $data.='hi,swoole';
                $read_process->write($data);



    }

    public function waitProcess()
    {
        //swoole_process::wait();
    }
});

