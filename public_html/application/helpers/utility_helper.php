<?php

function dd($a){
	var_dump($a);
	die;
}

function mysqldateformat($date){
    return date("Y-m-d", $date);
}

?>
