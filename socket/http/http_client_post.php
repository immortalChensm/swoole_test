<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 20:04
 */

$client = new swoole_client(SWOOLE_SOCK_TCP);

$client->connect("127.0.0.1",2346);
/***
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,;q=0.8
Accept-Encoding: gzip, deflate
Accept-Language: zh-CN,zh;q=0.9
Cache-Control: no-cache
Connection: keep-alive
Cookie: name=jack
Host: 123.56.12.53:2346
Pragma: no-cache
Upgrade-Insecure-Requests: 1
User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36
 **/
//$sendHeader = "";
//$sendHeader.= "POST / HTTP/1.1 \r\n";
//$sendHeader.="Host:123.56.12.53:2346\r\n";
//$sendHeader.="Content-Type: application/x-www-form-urlencoded\r\n";
//$sendHeader.="Accept:text/html,application/xhtml+xml,application/xml\r\n";
//$sendHeader.="Connection:keep-alive\r\n";
//$sendHeader.="Cookie:name=jack\r\n";
//$sendHeader.="User-Agent:Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36\r\n";
//
//
//
//$postData = json_encode(['name'=>'jackcsm','age'=>200]);
//$sendHeader.="Content-Length: ".strlen($postData);
//
//
//$sendHeader.="\r\n\r\n".$postData;
//
//
//
//$_sendHeader = $sendHeader;

$header = "POST / HTTP/1.1\r\n";
$header .= "Host: 127.0.0.1\r\n";
$header .= "Referer: http://group.swoole.com/\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Accept-Language: zh-CN,zh;q=0.8,en;q=0.6,zh-TW;q=0.4,ja;q=0.2\r\n";
$header .= "Cookie: pgv_pvi=9559734272; efr__Session=uddfvbm87dtdtrdsro1ohlt4o6; efr_r_uname=apolov%40vip.qq.com; efr__user_login=3N_b4tHW1uXGztWW2Ojf09vssOjR5abS4abO5uWRopnm0eXb7OfT1NbIoqjWzNCvodihq9qaptqfra6imtLXpNTNpduVoque26mniKej5dvM09WMopmmpM2xxcmhveHi3uTN0aegpaiQj8Snoa2IweHP5fCL77CmxqKqmZKp5ejN1c_Q2cPZ25uro6mWqK6BmMOzy8W8k4zi2d3Nlb_G0-PaoJizz97l3deXqKyPoKacr6ynlZ2nppK71t7C4uGarKunlZ-s; pgv_si=s8426935296; Hm_lvt_4967f2faa888a2e52742bebe7fcb5f7d=1410240641,1410241802,1410243730,1410243743; Hm_lpvt_4967f2faa888a2e52742bebe7fcb5f7d=1410248408\r\n";
$header .= "RA-Ver: 2.5.3\r\n";
$header .= "RA-Sid: 2A784AF7-20140212-113827-085a9c-c4de6e\r\n";

$_postData = ['body1' => 'swoole_http-server', 'message' => 'nihao'];
$_postBody = json_encode($_postData);

$header .=  "Content-Length: " . strlen($_postBody);

$header .=  "Content-Length: " . (strlen($_postBody) - 2);

$_sendStr = $header . "\r\n\r\n" . $_postBody;

$client->send($_sendStr);
$body = $client->recv();
var_dump($body);

