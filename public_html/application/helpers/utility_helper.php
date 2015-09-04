<?php

function dd($a){
	var_dump($a);
	die;
}

function mysqldateformat($date){
    return date("Y-m-d", $date);
}

function timestampdate($date){
	return strtotime($date);
}

function options($title = null, $availoptions = array(), $data=null){

	$selected = "";

	if ($data == null) {
		$selected = "selected";
	};

	$options = "<option disabled $selected>".$title."</option>"

	foreach ($availoptions as $key => $value) {

		if ($value == $data) {
			$selected = "selected";
		} else {
			$selected = "";
		};

		$options .= "<option value='{$value}' $selected>{$key}</option>
		";
	};

	return $options;
}

function check_selection( $value, $data ){

if ($value == $data) { echo "selected"; };
if ($row->issue_num == $advert['section-mag']) { echo "selected"; };
};

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

function make_directory($issue, $slug, $client = NULL){

	if ($issue == "adverts") {
		$issue = "adverts/".$client;
	} elseif ($issue != "blog") {
		$issue = "issue-".$issue;
	};

	//make issue dir first
	$issuetarget = "assets/uploads/".$issue."/";
	if (!file_exists($issuetarget)) {
	    mkdir($issuetarget, 0777, true);
	};

	//make article dir second
	$articletarget = "assets/uploads/".$issue."/".$slug."/";
	if (!file_exists($articletarget)) {
	    mkdir($articletarget, 0777, true);
	};

}

function move_files($source, $destination){
	// Get array of all source files
	if (file_exists($source)) {
		$files = scandir($source);
	} else {
		return "Failed";
		exit;
	};
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

	rmdir($source);	
}

function delete_files($source){
	// Get array of all source files
	$files = scandir($source);

	foreach ($files as $file) {
	  if (in_array($file, array(".",".."))) continue;
	  // If we copied this successfully, mark it for deletion
	  $delete[] = $source.$file;
	}

	foreach ($delete as $file) {
	  unlink($file);
	}

	rmdir($source);	

}

function update_image_links($sourcefolder, $destinationfolder, $text){

	$text = str_replace($sourcefolder, $destinationfolder, $text);

	return $text;

}

function get_files($directory) {

	$cleanfiles = array();

	if (file_exists($directory)) {
		$files = preg_grep('/^([^.])/', scandir($directory));

		foreach ($files as $value) {
			$cleanfiles[] = "/".$directory.$value;
		}

		return $cleanfiles;
	};
}

function objectToArray ($object) {
    if(!is_object($object) && !is_array($object))
        return $object;

    return array_map('objectToArray', (array) $object);
}

?>
