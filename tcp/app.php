<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/19
 * Time: 10:54
 */
namespace App;
class app
{
    private static $instance = null;
    private $request = null;
    private $response = null;
    private $loader = null;
    private $result = null;

    public static function getInstance($request,$response,$loader)
    {
        //if(!self::$instance instanceof self){
            self::$instance = new self($request,$response,$loader);
        //}
        return self::$instance;
    }

    private function __construct($request,$response,$loader)
    {
        $this->request = null;
        $this->response = null;
        $this->request = $request;
        $this->response = $response;
        $this->loader = $loader;
    }

    public  function run($controlerDeepen)
    {
        //先取得uri
        $uri = $this->request->server['request_uri'];
        //解析处理得到控制器，方法，参数
        if(!strpos($uri,"favicon.ico")) {


            $pathinfo = explode('/', $uri);
            if ($controlerDeepen == 1) {
                $controller = 'HttpController\\' . ucfirst($pathinfo[1]);
            } elseif ($controlerDeepen == 2) {
                $module = $pathinfo[1];
                if (isset($pathinfo[2])) {
                    $controller = 'HttpController\\' . $module . "\\" . ucfirst($pathinfo[2]);
                    $this->loader->addNameSpace(['HttpController\\' . $module . "\\" => dirname(__FILE__) . "/HttpController/" . $module . "/"]);
                } else {
                    $this->response->end("请求的控制器不存在");
                }

            }


            //检查是否存在查询字符串
            if (array_key_exists('query_string', $this->request->server)) {
                $params = $this->request->server['query_string'];
            } else {
                $params = [];
            }
            try {
                $class = new \ReflectionClass($controller);
                $obj = $class->newInstance([$this->request, $this->response]);

                if ($controlerDeepen == 1) {

                    if (isset($pathinfo[2])) {
                        if ($class->hasMethod($pathinfo[2])) {
                            $method = $class->getMethod($pathinfo[2]);
                            if ($obj->onRequest($pathinfo[2])) {
                                //$result = $method->invoke($obj);
                                if(count($method->getParameters())>0){

                                    $method_param = "Model\\".ucfirst($method->getParameters()[0]->name);
                                    $method->invokeArgs($obj,[new $method_param]);
                                }else{
                                    $method->invoke($obj);
                                }


                            } else {
                                $result = $method . "方法禁止运行";
                            }
                        } else {
                            $obj->onActionNotFound($pathinfo[2]);
                        }
                    }
                } elseif ($controlerDeepen == 2) {
                    if (isset($pathinfo[3])) {
                        if ($class->hasMethod($pathinfo[3])) {
                            $method = $class->getMethod($pathinfo[3]);
                            if ($obj->onRequest($pathinfo[3])) {
                                //$result = $method->invoke($obj);
                                $method->invoke($obj);
                            } else {
                                $result = $method . "方法禁止运行";
                            }
                        } else {
                            $obj->onActionNotFound($pathinfo[3]);
                        }
                    }
                }


            } catch (\ReflectionException $e) {
                echo $e->getCode().PHP_EOL;
                echo $e->getMessage().PHP_EOL;
                echo $e->getLine().PHP_EOL;
                $this->response->end("<h2>Http请求错误:请求的控制器不存在</h2>");

            }
        }

        return $this;
    }
}