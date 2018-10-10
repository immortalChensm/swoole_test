<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/25
 * Time: 16:45
 */

\Swoole\Async::dnsLookup("www.easyswoole.com", function ($domainName, $ip) {
    print_r($ip);
    $cli = new swoole_http_client($ip, 80);
    $cli->setHeaders([
        'Host' => $domainName,
        "User-Agent" => 'Chrome/49.0.2587.3',
        'Accept' => 'text/html,application/xhtml+xml,application/xml',
        'Accept-Encoding' => 'gzip',
    ]);
    $cli->get('/index.html', function ($cli) {
        echo "Length: " . strlen($cli->body) . "\n";
        echo $cli->body;
    });
});