<?php

include ('line-bot.php');
$channelSecret = 'xxx';
$access_token  = 'xxxxxxxxxxxxxxxxxxxxxxx';

$bot = new BOT_API($channelSecret, $access_token);

    
if (!empty($bot->isEvents)) {
        
    $bot->replyMessageNew($bot->replyToken, json_encode($bot->message));

    if ($bot->isSuccess()) {
        echo 'Succeeded!';
        exit();
    }


    echo "<pre>";
    var_dump($bot->response);

    // Failed
    echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
    exit();

}
