<?php
$access_token = 'I7My0/9QXevs6mCqXPe+JuejCrLmp6TuYRQSGh5o4r1l62F04OMc8csVbJOcn/y68vqmQKkcbjtA3M1R0a8wBGYOag4TQSPKNt2pUlSutwj/sYNvrV4pW6p+ttbh9xNbvEiKjU7bo8j2Dd4iYebJKQdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;