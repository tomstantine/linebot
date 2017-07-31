<?php
$access_token = 'iyzxmENf2gQ0OqPLPnqRCLhtiuQOJU/q/APRq1OhUA9V/UPF0gksiq5b4PPFfUic8vqmQKkcbjtA3M1R0a8wBGYOag4TQSPKNt2pUlSutwh7WX5rrququKSiQjRa7OCGR07u5e9xx9VrUrMxdAWcdwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$proxy = 'proxyurl:http://fixie:QzdR7a5mSBt7FCC@velodrome.usefixie.com:80';
$proxyauth = 'tomcs19@gmail.com:he123449';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

