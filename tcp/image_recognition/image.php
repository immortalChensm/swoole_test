<?php

require_once __DIR__ . '/index.php';
use QcloudImage\CIClient;

$appid = '1256463423';
$secretId = 'AKID2vb5LNO4lFZgbIM6E8oHZeWDj16xr1ED';
$secretKey = 'vgEYeXCesuiR2QbZJrCKEvPjqjT0JOFu';
$bucket = 'itkucode';

$client = new CIClient($appid, $secretId, $secretKey, $bucket);
$client->setTimeout(30);


//图片标签
//单个图片url
//var_dump ($client->tagDetect(array('url'=>'YOUR URL')));


//单个图片file
$result = json_decode($client->image_recognition(array('file'=>'game.jpg')),true);
$item = $result['data']['items'];

foreach($item as $word){
    echo $word['itemstring'];
}


//单个图片内容
//var_dump ($client->tagDetect(array('buffer'=>file_get_contents('G:\pic\hot1.jpg'))));

