<?php
 
require 'tropo.class.php';
require 'lib/limonade.php';
 
dispatch_post('start', 'app_start');
function app_start() {
     
    $session = new Session();
     
    $tropo = new Tropo();
     
    if($session->getParameters("action")) {
 
        $tropo->call("+14075550100", array('network'=>'SMS'));
        $tropo->say("Received office voice mail.");
         
        $tropo->RenderJson();
    }
    else {
         
        $tropo->record(array("say"=>"We're not available right now, please leave your message at the beep.", "name" => "recording", "url" => "http://example.com/tropo"));
         
        $tropo->on(array("event" => "continue", "next" => "hello_world.php?uri=call"));
        $tropo->on(array("event" => "hangup", "next" => "hello_world.php?uri=call"));
         
        $tropo->RenderJson();
    }
}
 
dispatch_post('/call', 'app_call');
function app_call() {
    $token = 'your_token'; 
    $curl_handle=curl_init(); 
     
    curl_setopt($curl_handle,CURLOPT_URL,'http://api.tropo.com/1.0/sessions?action=create&token='.$token); 
    curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2); 
    curl_exec($curl_handle); 
    curl_close($curl_handle); 
}
 
run();
 
?>
