<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/28
 * Time: 17:01
 */

class Myclient extends swoole_http_client
{
    public function run()
    {
        $this->setHeaders([
            'user-agent'=>'jack'
        ]);
//
//        $this->get("/api/users",function(swoole_http_client $client){
//            echo $client->body;
//            echo $client->statusCode;
//            echo $client->headers;
//            echo $client->cookies;
//        });

//        $this->post("/api/users/1/edit",['name'=>'jack'],function(swoole_http_client $client){
//            echo $client->body;
//        });

//        $this->setMethod("PUT");
//        $this->setData(['a'=>'b']);
//        $this->execute("/api/users/1",function (swoole_http_client $client){
//            echo $client->body;
//        });
        $this->addFile("./client.php","file");
        $this->post("/api/user/upload",['a'=>'b'],function (swoole_http_client $client){
            echo $client->body;
        });

       // $this->close();
    }
}

(new Myclient("118.24.77.117",2346))->run();

/**
http服务模型
 服务器监听端口，等客户端连接
 客户端创建一个client，然后发起http请求[get,post,delete,put,patch]等
 请求，服务器Onrequest请求事件函数被运行，得到结果后返回给客户端
 客户端可以打印响应的状态行，响应内容，响应头，响应cookie等信息
 客户端也可以上传文件，以及发起头，cookie请求
 客户端支持异步事件回调和协程方式

 **/