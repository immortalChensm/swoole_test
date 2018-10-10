<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/19
 * Time: 10:51
 */

class Autoloader
{

    public $nameSpace = [];

    public $baseDir = '';

    public function __construct()
    {
        $this->baseDir = dirname(__FILE__);
        spl_autoload_register([$this,'loader']);
    }

    public function loader($className)
    {

        //echo '当前正在调用的类是：'.$className.PHP_EOL;
        //１先获得该类的类文件
        //类的完整名称：命名空间+类名[文件]
        echo '自动加载的类名是:'.$className.PHP_EOL;
        $file = substr(strrchr($className,"\\"),1);
        $prefix = substr($className,0,strripos($className,"\\"))."\\";

        //从命名空间映射表里查找是否存在
        if(array_key_exists($prefix,$this->nameSpace)){
            //存在找到对应的路径
            $dirpath = $this->nameSpace[$prefix];
            $filepath = $dirpath.$file.".php";
            if($this->includefile($filepath)){
                return true;
            }else{
                echo '类文件引入失败'.$filepath.PHP_EOL;
            }
        }else{

            echo '命名空间未注册'.PHP_EOL;
        }
    }

    public function  addNameSpace($path)
    {
        $this->nameSpace = array_merge($this->nameSpace,$path);
    }

    public function includefile($file)
    {
        if(file_exists($file)){

            include_once $file;
            return true;
        }else{
            return false;
        }
    }
}