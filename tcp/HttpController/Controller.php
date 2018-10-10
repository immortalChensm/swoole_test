<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/19
 * Time: 10:41
 */
namespace HttpController;

class Controller
{
    protected $request = null;
    protected $response = null;

    public function __construct($HttpObj)
    {
        $this->request = $HttpObj[0];
        $this->response = $HttpObj[1];
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function onActionNotFound($actionName)
    {
        $this->response->end($actionName."不存在");
    }

    public function onRequest($actionName)
    {
        return true;
    }

    public function success($msg,$url,$time=3)
    {
        if($time){

            $html = <<<html
<a href="{$url}" style="padding:10px;display:block;text-decoration:none;text-align:center;font-size:20px;background:black;color:lightgreen;font-weight: bold;">$msg</a>
<script type="text/javascript">
    
    setTimeout(function(){
        window.location.href = "$url";
    },$time*1000)
    
</script>
html;
            $this->getResponse()->end($html);

        }
    }

    public function error($msg,$url,$time=3)
    {

    }
}