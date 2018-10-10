<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/27
 * Time: 13:54
 */
//tcp协程客户端

go(function () {
    $client = new \Swoole\Coroutine\Client(SWOOLE_SOCK_TCP);

    //设置服务器返回的数据检测
//    $client->set([
//        'open_eof_check' => true,//开启数据边界检测
//        'package_eof' => "*",//边界分割符号
//
//    ]);

      $client->set([
          'open_length_check'     => true,
          'package_length_type'   => 'N',//N　无符号４个字节３２位
          'package_length_offset' => 0,       //第N个字节是包长度的值
          'package_body_offset'   => 4,       //第几个字节开始计算长度
          'package_max_length'    => 20000,  //协议最大长度
      ]);

    if (!$client->connect('127.0.0.1', 8888, 0.5))
    {
        exit("connect failed. Error: {$client->errCode}\n");
    }
    //$client->send("hello world*");
    //echo $client->recv();

    //$data = $client->peek();
    //echo $data.PHP_EOL;
    //echo $client->peek();

    //$client->close();

//    while(1){
//        echo '来自服务器端的数据是：'.$client->recv().PHP_EOL;
//        $data = fgets(STDIN);
//        if($data){
//            $client->send($data."*");
//        }
//    }

    $data = [
        'str1'=>str_repeat('A',rand(100,1000)),
        'str2'=>str_repeat('B',rand(200,2000))
    ];

    $data['int3'] = rand(1000,9999);
    $sendStr = serialize($data);
    $sendData = pack('N',strlen($sendStr)).$sendStr;
    echo 'sendData-length:'.strlen($sendData).PHP_EOL;
    $client->send($sendData);

    $rece_data = $client->recv();

    $rece_str = unserialize(substr($rece_data,4));
    echo "来自服务器的数据是：";
    print_r($rece_str);

    $client->close();
});



