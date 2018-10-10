<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/20
 * Time: 11:12
 */

namespace Model;

class Article extends Model
{
    public function get($p=0)
    {
        //返回文章列表
        //排序　　按时间倒序排列，每次显示１０条数据
        //redis sort语法　　SORT mylist BY weight_*->fieldname GET object_*->fieldname
        // sort articleObjTime desc by articleObj:*->add_time
        //
        //
        // get articleObj:*->add_time
        //
        // get articleObj:*->title
        //
        // get articleObj:*->context
        //
        // get articleObj:*->author
        //
        // get #▒ limit 0 2
        //"desc by articleObj:*->add_time get articleObj:*->title get articleObj:*->context get articleObj:*->author get # limit 0 2"
        //print_r($this->getRedis());
        //$list = $this->getRedis()->sort("articleObjTime",[
        //    "by"=>"desc"
        //]);
        //$list = $this->getRedis()->keys("*");
        //return $list;
        $redis = $this->getNativeRedis();
        $lists = [];
        $offset = 5;
        $list = $redis->sort("articleObjTime",[
            'soft'=>'desc',
            'by'=>'articleObj:*->add_time',
            'get'=>[
                'articleObj:*->title',
                'articleObj:*->context',
                'articleObj:*->author',
                'articleObj:*->add_time',
                'articleObj:*->id'
            ],
            'limit'=>[$p?:0,$offset]
        ]);
        //print_r($list);
        $temp = [];
        $page = ceil($redis->zCard("articleObjTime")/$offset);

        foreach ($list as $k=>$v){
            //print_r(($k+1)%5);

            if(($k+1)%5==0){
                $temp[] = $v;
                $data = [];

                foreach ($temp as $kk=>$vv){
                    if($kk==0){
                        $data['title'] = $vv;
                    }elseif($kk==1){
                        $data['context'] = $vv;
                    }elseif($kk==2){
                        $data['author'] = $vv;
                    }elseif($kk==3){
                        $data['add_time'] = date("Y-m-d H:i",$vv);
                    }elseif($kk==4){
                        $data['id'] = $vv;
                    }
                }
                $lists[] = $data;
                $temp = [];
            }else{
                $temp[] = $v;
            }

        }
        return ['lists'=>$lists,'page'=>$page];


    }

    //控制用户提交频率
    private function addNumLimit($remoteIp)
    {
        //控制策略　１分钟以内只允许提交１０次　
        /**
        将用户每次访问的ip保存起来，保存的ip数量只能有１０个，每次进来判断是否超过１０个，超过１０个时，则获取列队的最后一个元素[最后一个元素是第一次的访问时间]
         * 将当前的时间和第一次的时间对比，在１分钟以内则禁止提交
         **/

        //键名：addLimit:ip 数据类型　　列队
        $key = "articleAddLimit:".$remoteIp;

        if($this->getRedis()->exists($key)){
            $ip = $this->getRedis()->lRange($key,0,-1);
            if(count($ip)<10){


                $this->getRedis()->lPush($key,$remoteIp.":".time());
            }else{
                //取最后一个元素
                //$last = $this->getRedis()->lPop($key);
                $last = $this->getRedis()->lIndex($key,-1);
                $last_time = explode(":",$last);
                if(time()-$last_time[1]<60){
                    return false;//60秒内已经访问超过１０次了
                }else{
                    //６０秒内访问未超过１０次，则继续添加，并保持１０个元素
                    $this->getRedis()->lPush($key,$remoteIp.":".time());
                    $this->getRedis()->lTrim($key,0,10);
                }
            }
        }else{
            //判断是第一次时，给键设置过期时间为１分钟
            //$this->getRedis()->multi();
            $this->getRedis()->lPush($key,$remoteIp.":".time());
            $this->getRedis()->expire($key,60);
            //$this->getRedis()->exec();
        }



        return true;
    }
    public function add($data,$remoteIp)
    {

        if(!$this->addNumLimit($remoteIp)){
            return ['status'=>0,'msg'=>'您的提交频率次数太高了，休息一伙儿吧，老表'];
        }

        //过滤数据
        $data['title'] = htmlspecialchars_decode($data['title']);
        $data['author'] = htmlspecialchars_decode($data['author']);
        $data['context'] = htmlspecialchars_decode($data['context']);

        //验证数据
        if(strlen($data['title'])<2){
            return ['status'=>0,'msg'=>'标题不得小于２字符'];
        }elseif(strlen($data['title']>30)){
            return ['status'=>0,'msg'=>'标题不得小于３０字符'];
        }

        //存储策略
        /***************
        1、先检测文章标题是否重复　[可以使用　集合存储保证唯一]
         2、自定义文章的id自递键article=id [使用字符串类型]
         3、存储文章的时间
         ４、获取文章列表时使用排序指令sort来排序和指定要获取的条数
         *
         5、还得单独存储文章的标题
         6、单独保存每个文章的发布时间　　采用有序集合存储

        文章自增的id键：articleId
        文章的记录键:aritlceObj:x
        数据结构
        aritlceObj:x title articleObj:x author articleObj:x context articleObj:x time

         ******************/

         if(!$this->getRedis()->sIsMember("articleTitle",$data['title'])){

             $articleid = $this->getRedis()->incr("articleId");
             //开启redis事务支持
             $this->getRedis()->multi();
             //保存文章的内容
             $articleObj = "articleObj:".$articleid;

             $this->getRedis()->hSet($articleObj,"title",$data['title']);
             $this->getRedis()->hSet($articleObj,"author",$data['author']);
             $this->getRedis()->hSet($articleObj,"context",$data['context']);
             $this->getRedis()->hSet($articleObj,"id",$articleid);
             $this->getRedis()->hSet($articleObj,"add_time",time());

             //保存文章的标题
             $this->getRedis()->sAdd("articleTitle",$data['title']);

             //保存文章的发布时间
             //语法　zadd key score field
             $this->getRedis()->zAdd("articleObjTime",time(),$articleid);
             //提交事务
             if($this->getRedis()->exec()){

                 return ['status'=>1,'msg'=>'文章保存成功'];
             }



         }else{
             return ['status'=>0,'msg'=>'你要保持的文章已经存在'];
         }


        return '文章添加了';
    }

    public function delete($articleId)
    {
        /**
        删除文章
         * １文章的id　string 文章的递增键
         * 2文章的发布时间 sortset　　文章的发布时间
         * 3文章的内容 hash　　文章的实体
         * 4文章的标题　set　　文章的标题
         **/

        $articleId = $articleId;

        //文章发布时间键　有序集合　删除请求zrem key field
        $aritcleTimeKey = "articleObjTime";
        //文章实体键  散列哈希　删除语法 hdel key
        $articleObjKey = "articleObj:".$articleId;
        //文章标题键 无序集合　　删除语法　srem key field
        $articleTitleKey = "articleTitle";

        //先删除文章标题　　先找到标题
        if($this->getRedis()->exists($articleObjKey)){
            $article_title = $this->getRedis()->hGet($articleObjKey,"title");

            $this->getRedis()->sRem($articleTitleKey,$article_title);
            //删除发布时间
            $this->getRedis()->zRem($aritcleTimeKey,$articleId);
            //删除文章实体
            $this->getRedis()->del($articleObjKey);

            return ['status'=>1,'msg'=>'文章删除成功'];
        }else{
            return ['status'=>0,'msg'=>'文章不存在无法删除'];
        }


    }
}