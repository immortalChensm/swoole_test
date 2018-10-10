<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/22
 * Time: 11:43
 */

namespace HttpController;

class Wechat extends Controller
{
    public function getIntheaters()
    {
        $url = "http://api.douban.com/v2/movie/in_theaters?start=0&count=3";

        $api = file_get_contents($url);
        $this->getResponse()->end($api);
    }

    public function getCommingSoon()
    {
        $url = "http://api.douban.com/v2/movie/coming_soon?start=0&count=3";
        $api = file_get_contents($url);
        $this->getResponse()->end($api);
    }

    public function getTop250()
    {
        $url = "http://api.douban.com/v2/movie/top250?start=0&count=3";
        $api = file_get_contents($url);
        $this->getResponse()->end($api);
    }

    public function getTop250No()
    {
        $start = $this->getRequest()->get['start'];
        $count = $this->getRequest()->get['count'];
        print_r($this->getRequest());

        $url = "http://api.douban.com/v2/movie/top250?start={$start}&count={$count}";
        echo $url;
        $api = file_get_contents($url);
        $this->getResponse()->end($api);
    }

    public function search()
    {
        $keyword = "刘德华";
        $url = "http://api.douban.com/v2/movie/search?q={$keyword}";
        $api = file_get_contents($url);
        $this->getResponse()->end($api);
    }

    public function test()
    {
        print_r($this->getRequest()->post);
        $this->getResponse()->end(json_encode($this->getRequest()->post));
    }

    public function details()
    {
        $movieId = $this->getRequest()->post['id'];
        $url = "http://api.douban.com/v2/movie/subject/".$movieId;
        $api = file_get_contents($url);
        $this->getResponse()->end($api);
    }

    public function upload()
    {
        $file = $this->getRequest()->files;
        print_r($file);

        if(is_uploaded_file($file['file']['tmp_name'])){
            if(move_uploaded_file($file['file']['tmp_name'],"/home/itkucode/sw/tcp/Uploads/".$file['file']['name'])){

            }
        }
        $this->getResponse()->end(json_encode($file));
    }
}