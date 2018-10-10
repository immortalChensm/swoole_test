<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/19
 * Time: 9:31
 */

namespace HttpController;

class Admin extends Controller
{

    public function index()
    {
        print_r($this->get);
        return 'hello,这里是登录页面';
    }
}