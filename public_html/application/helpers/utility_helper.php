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

function make_directory($issue, $slug){

	//make issue dir first
	$issuetarget = "assets/uploads/issue-".$issue."/";
	if (!file_exists($issuetarget)) {
	    mkdir($issuetarget, 0777, true);
	};

	//make article dir second
	$articletarget = "assets/uploads/issue-".$issue."/".$slug."/";
	if (!file_exists($articletarget)) {
	    mkdir($articletarget, 0777, true);
	};

}

function move_files($source, $destination){
	// Get array of all source files
	$files = scandir($source);

	//dd($files);
	// Cycle through all source files
	foreach ($files as $file) {
	  if (in_array($file, array(".",".."))) continue;
	  // If we copied this successfully, mark it for deletion
	  if (copy($source.$file, $destination.$file)) {
	    $delete[] = $source.$file;
	  }
	}

	// Delete all successfully-copied files
	//dd($delete);
	foreach ($delete as $file) {
	  unlink($file);
	}

	//rmdir($source);	
}

function update_image_links($sourcefolder, $destinationfolder, $text){

	$text = str_replace($sourcefolder, $destinationfolder, $text);

	return $text;

}

?>
