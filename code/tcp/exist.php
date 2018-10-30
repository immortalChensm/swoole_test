<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/27
 * Time: 16:02
 */

class G{

    static $server;
    private static $buffers = [];
    public static function getBuffer($fd,$create=true){
        if (!isset(self::$buffers[$fd])){
            if (!$create){
                return false;
            }
            self::$buffers[$fd] = new swoole_buffer(1024*1);
        }
        return self::$buffers[$fd];
    }
}

$mode = SWOOLE_PROCESS;
$config = [
    'task_worker_num'=>2,
    'user'=>'jackcsm',
    'group'=>'jackcsm',
    'chroot'=>'/home/sw4.4/tmp',
    'heartbeat_idle_time'=>600,
    'heartbeat_check_interval'=>60,
];

if (isset($argv[1]) && $argv[1] == 'daemonize'){
    $config['daemonize'] = true;
}else{
    $config['daemonize'] = false;
}

$server = new swoole_server("0.0.0.0",9501,$mode);
$server->set($config);
G::$server = $server;

$server->on("connect","My_connect");
$server->on("receive","My_receive");
$server->on("close","My_close");
$server->on("task","My_task");
$server->on("finish","My_finish");
$server->on("start","My_start");
$server->on("ManagerStart","My_ManagerStart");
$server->on("shutdown","My_Shutdown");
$server->start();

function My_start(swoole_server $server){
    global $argv;
    swoole_set_process_name("php {$argv[0]} master");
    echo "MasterPid={$server->master_pid}|ManagerPid={$server->manager_pid}\n";
    echo "server:start swoole version is [".SWOOLE_VERSION."]\n";
}

function My_ManagerStart(swoole_server $server)
{
    global $argv;
    swoole_set_process_name("php {$argv[0]} manager");

}
function My_log($msg){
    echo $msg.PHP_EOL;
}

function My_shutdown(swoole_server $server){
    echo "server shutdown\n";
}

function My_close(swoole_server $server,$fd,$reactorId){
    My_log("Worker#{$server->worker_pid}Client[{$fd}@{$reactorId}] :fd={$fd} is closed");
    $buffer = G::getBuffer($fd);
    if ($buffer){
        $buffer->clear();
    }
    if ($server->exist($fd)){
        echo 'FD['.$fd.'] is exists'.PHP_EOL;
    }else{
        echo 'FD['.$fd.'] is not exists'.PHP_EOL;
    }
}

function My_connect(swoole_server $server,$fd,$reactorId){
    if ($server->exist($fd)){
        echo 'FD['.$fd.'] exits'.PHP_EOL;
    }else{
        echo 'FD['.$fd.'] is not exits'.PHP_EOL;
    }
}

function My_receive(swoole_server $server,$fd,$reactorId,$data){
    if ($server->exist($fd)){
        echo 'FD['.$fd.'] is exits'.PHP_EOL;
    }else{
        echo 'FD['.$fd.'] is not extis'.PHP_EOL;
    }

    $server->task($data.'-'.$fd);
}

function My_task(swoole_server $server,$taskId,$src_workerid,$data){

    list($str,$fd) = explode("-",$data);
    if ($server->exist($fd)){
        echo 'FD['.$fd.'] is exits'.PHP_EOL;
    }else{
        echo 'FD['.$fd.'] is not exits'.PHP_EOL;
    }

    echo 'Task[PID='.$server->worker_pid.']:task_pid='.$taskId.PHP_EOL;
    return $data;
}

function My_finish(swoole_server $server,$taskId,$data){

    list($str,$fd) = explode("-",$data);
    $server->send($fd,'Send Data to Fd['.$fd.']');
    echo "Task finish:result={$data}".".PID=".$server->worker_pid.PHP_EOL;
}

