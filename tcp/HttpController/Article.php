<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/20
 * Time: 11:16
 */

namespace HttpController;

use Model\Article as A;

class Article extends Controller
{
    public function index()
    {
        if($this->getRequest()->server['request_method']=='POST'){
            $article = new A();
            $list = $article->get($this->getRequest()->post['p']);
            $this->getResponse()->header("Content-type","application/json;charset=utf-8");
            $this->getResponse()->end(json_encode($list));
            //$this->getResponse()->end(123);
        }

    }

    public function add(\Model\Article $article)
    {
        //print_r($this->getRequest()->server);
        if($this->getRequest()->server['request_method']=='POST'){

            $result = $article->add($this->getRequest()->post,$this->getRequest()->server['remote_addr']);
            //$this->getResponse()->end(json_encode($result,JSON_UNESCAPED_UNICODE));
            if($result['status']==1){
                $this->success('文章保存成功',"/Article/articles.html",3);
            }else{
                //
                $this->success($result['msg'],"/Article/index.html",3);
            }
        }else{
            $this->getResponse()->end("请求方法错误了");
        }


    }

    public function delete(\Model\Article $article)
    {
        if($this->getRequest()->server['request_method']=='POST'){

            $result = $article->delete($this->getRequest()->post['articleId']);
            //$this->getResponse()->end(json_encode($result,JSON_UNESCAPED_UNICODE));
            if($result['status']==1){
                //$this->success('文章删除成功',"/Article/articles.html",3);
                $this->getResponse()->end("文章删除成功");
            }else{
                //
                $this->getResponse()->end($result['msg']);
               // $this->success($result['msg'],"/Article/articles.html",3);
            }
        }else{
            $this->getResponse()->end("请求方法错误了");
        }
    }

    public function upload()
    {
        //print_r($this->getRequest()->files);

        if(is_uploaded_file($this->getRequest()->files['file']['tmp_name'])){
            $file = "/home/itkucode/sw/tcp/Uploads/".$this->getRequest()->files['file']['name'];
            if(move_uploaded_file($this->getRequest()->files['file']['tmp_name'],$file)){
                $this->getResponse()->end(json_encode(['status'=>1,'msg'=>'文件上传成功','file'=>$file]));
            }
        }else{
            $this->getResponse()->end("上传的临时文件不存在");
        }

    }

    public function rawContent()
    {
        print_r($this->getRequest()->rawContent());
        $this->getResponse()->end($this->getRequest()->rawContent());
    }

    public function getData()
    {
        $this->getResponse()->end($this->getRequest()->getData());
    }

    public function responseSet()
    {
//        $this->getResponse()->header("name","swoole4.0 server");
//        $this->getResponse()->status("900");
//        $this->getResponse()->cookie("name","swoole");
//        $this->getResponse()->write("hi");
//        $this->getResponse()->end();

//        $this->getResponse()->gzip(1);
//        $file  = file_get_contents("http://www.baidu.com");
//        $this->getResponse()->end($file);

          //$this->getResponse()->redirect("http://www.baidu.com",301);
        //$this->getResponse()->header("Content-type","text/plain");
        //$this->getResponse()->sendfile("/home/itkucode/sw/tcp/HttpController/User.php",0,4);

        $this->getResponse()->end(json_encode($_POST));

    }

    public function tcp()
    {
         $data = $this->getRequest()->get['name'];

//        $client = new \swoole_client(SWOOLE_SOCK_TCP);
//        if (!$client->connect('127.0.0.1', 2347, -1))
//        {
//            exit("connect failed. Error: {$client->errCode}\n");
//        }
//        $client->send($data);
//        $result = $client->recv();
//        $this->getResponse()->end($result);
//        $client->close();

//        $response = $this->getResponse();
//
//        $client = new \swoole_client(SWOOLE_SOCK_TCP, SWOOLE_SOCK_ASYNC);
//        $client->on("connect", function(\swoole_client $cli) use($data){
//            $cli->send($data);
//        });
//        $client->on("receive", function(\swoole_client $cli, $data)use($response){
//            echo "Receive: $data";
//            //$cli->send(str_repeat('A', 100)."\n");
//            //sleep(1);
//            $response->end($data);
//            $cli->close();
//        });
//        $client->on("error", function(\swoole_client $cli){
//            echo "error\n";
//        });
//        $client->on("close", function(\swoole_client $cli){
//            echo "Connection close\n";
//        });
//        $client->connect('127.0.0.1', 2347);



    }

    public function say()
    {
        $data = $this->getRequest()->get['words'];
        foreach ($this->server->connections as $fd){
            $this->server->push($fd,$data);
        }
    }
}