<?php
 
require 'tropo.class.php';
require 'lib/limonade.php';
 
dispatch_post('/start', 'app_start');
function app_start() {
 
    $tropo = new Tropo();
 
    $options = array("choices" => "red, blue, green", "name" => "color", "attempts" => 3, "timeout" => 10);
  
    $tropo->ask("What's your favorite color?  Choose from red, blue or green.", $options);
 
    $tropo->on(array("event" => "continue", "next" => "hello_world.php?uri=continue"));
 
    $tropo->RenderJson();
}
 
dispatch_post('/continue', 'app_continue');
function app_continue() {
 
    $tropo = new Tropo();
    @$result = new Result();
     
    $answer = $result->getValue();
     
    $tropo->say("You said " . $answer);
     
    $tropo->RenderJson();
 
}
 
run();
 
?>