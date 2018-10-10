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
$sendHeader = "";
$sendHeader.= "GET / HTTP/1.1 \r\n";
$sendHeader.="Host:123.56.12.53:2346\r\n";
$sendHeader.="Accept:text/html,application/xhtml+xml,application/xml\r\n";
$sendHeader.="Connection:keep-alive\r\n";
$sendHeader.="Cookie:name=jack\r\n";
$sendHeader.="User-Agent:Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36\r\n";
$sendHeader.="\r\n";

$_sendHeader = $sendHeader;


$client->send($_sendHeader);
$body = $client->recv();
var_dump($body);

