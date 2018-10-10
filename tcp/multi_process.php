<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/24
 * Time: 16:43
 */

$data = file_get_contents("http://www.taobao.com");
$start_time = time();
for($i=0;$i<strlen($data);$i++){
    echo $i;
}

echo '耗时为：'.(time()-$start_time).'秒';

