<?php
require_once 'classes/limonade.php';
require_once 'classes/tropo.class.php';
$tropo = new Tropo();	
    $tropo->ask("What's your four or five digit pin? Press pound when finished", array(
        "choices"=>"[4-5 DIGITS]",
        "terminator" => "#",
        "timeout" => 15.0,
        "mode" => "dtmf",
        "onChoice" => "choiceFCN"
        )
    );
    function choiceFCN($event) {
        $tropo->say("Thank you");
        }
		run();
?>
