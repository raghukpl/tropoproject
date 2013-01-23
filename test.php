<?php
 
require 'tropo.class.php';
require 'lib/limonade.php';
 
// This is a helper method, used when the caller initially sends in a valid input over the text channel.
function valid_text(&$tropo, $initial_text) {
     
// Create a new instance of the Session object, and get the channel information.
$session = new Session();
$from_info = $session->getFrom();
$network = $from_info['channel'];
$mysql=mysql_connect("localhost","root");
mysql_select_db("rrdg");   
         
// Welcome prompt.
$tropo->ask("Welcome to  PDIT and please enter the IVR id your");
 if ($initial_text == "[DIGIT]{1}[DIGIT]{2}[DIGIT]{3}") 
        {$tropo->say("The name corresponding to above IVR id is" mysql_query(select sname from ini where sid='$initial_text'));}
?>











