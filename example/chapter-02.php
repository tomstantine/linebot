<?php

include ('line-bot.php');

$channelSecret = '688e81375e6ea0f3f930264a5973fc8b';
$access_token  = 'I7My0/9QXevs6mCqXPe+JuejCrLmp6TuYRQSGh5o4r1l62F04OMc8csVbJOcn/y68vqmQKkcbjtA3M1R0a8wBGYOag4TQSPKNt2pUlSutwj/sYNvrV4pW6p+ttbh9xNbvEiKjU7bo8j2Dd4iYebJKQdB04t89/1O/w1cDnyilFU=';


$bot = new BOT_API($channelSecret, $access_token);
	
$bot->sendMessageNew('U39f72cc.....d460d6ddf', 'Hello World !!');

if ($bot->isSuccess()) {
    echo 'Succeeded!';
    exit();
}

// Failed
echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
exit();
