<?php

function dd($a){
	var_dump($a);
	die;
}

function mysqldateformat($date){
    return date("Y-m-d", $date);
}

function category($selected){

	$select = array(
		'art' => '',
		'music' => '',
		'poetry' => '',
		'design' => ''
		);

	switch ($selected) {
		case 'art':
			$select['art'] = "selected";
			break;

		case 'music':
			$select['music'] = "selected";
			break;

		case 'poetry':
			$select['poetry'] = "selected";
			break;

		case 'design':
			$select['design'] = "selected";
			break;
		
		default:
			// default action.
			break;
	};

	return $select;

}

?>
