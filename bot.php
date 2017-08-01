
<?php
$access_token = 'iyzxmENf2gQ0OqPLPnqRCLhtiuQOJU/q/APRq1OhUA9V/UPF0gksiq5b4PPFfUic8vqmQKkcbjtA3M1R0a8wBGYOag4TQSPKNt2pUlSutwh7WX5rrququKSiQjRa7OCGR07u5e9xx9VrUrMxdAWcdwdB04t89/1O/w1cDnyilFU=';
$proxy = 'proxyurl:http://fixie:QzdR7a5mSBt7FCC@velodrome.usefixie.com:80';
$proxyauth = 'tomcs19@gmail.com:he123449';



// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
  // Loop through each event
  foreach ($events['events'] as $event) {
    // Reply only when message sent is in 'text' format
    if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
      // Get text sent
      $text = $event['message']['text'];
      // Get replyToken
      $replyToken = $event['replyToken'];

      // Build message to reply back
      $respTxt='';
      /*if($text=='สวัสดี'){
        $respTxt='สวัสดีเหมือนกันจ๊ะ';
      }elseif($text=='เทพ'){
        $respTxt='ชัวอยู่แล้ว';
      }else{
        $respTxt='พอแค่นี้ก่อน จะนอนแระ';
      }*/

      $respTxt=resSimsimi($text);

      $messages = [
        'type' => 'text',
        'text' => $respTxt
      ];

      // Make a POST Request to Messaging API to reply to sender
      $url = 'https://api.line.me/v2/bot/message/reply';
      $data = [
        'replyToken' => $replyToken,
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_PROXY, $proxy);
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);

      $result = curl_exec($ch);
      curl_close($ch);

      echo $result . "\r\n";
    }
  }
}



/*********************
* simsimi
**********************/
function resSimsimi($text=''){

  $config = [               
                'simsimi' => [
                    // 'endpoint' => 'http://api.simsimi.com/request.p',    // paid key
                    'endpoint' => 'http://sandbox.api.simsimi.com/request.p',   // trial key
                    //'token'    => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
                    'locale'   => 'th'    // View locale support at http://developer.simsimi.com/lclist.
                ]
            ];

    $key="8b1aec46-185b-4e9c-8c42-c142e0d8b523";
    $lc="th";
    $fc="1.0";
  
   $json = curl($config['simsimi']['endpoint']
            ."?key=". $key
            ."&lc=". $lc
            ."&ft=1.0&text=".urlencode($text));

    $arr = json_decode($json, true);
    if(empty($arr['response'])) {
        // This trial api will have less db. Use paid key for full db. I don't try so I don't know it worth or not?
        $arr['response'] = "[Itom not response.]";
    }

    return $arr['response'];


}


function curl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $html = curl_exec($ch);
    curl_close($ch);
    return $html;

}

