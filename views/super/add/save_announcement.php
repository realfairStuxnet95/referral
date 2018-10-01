<?php
$data=$_POST['info'];
if(is_array($data)){
	require_once '../../../includes/database.inc.php';
	include_once '../../../includes/Functions.php';
	include_once '../../../controllers/SuperAdmin.php';
	//actions
	$option=1;
	$id=1;
	$title="System Has Been changed";
	$category="NOTIFICATION";
	$target="*";
	$description="Welcome to our homeland of technology";
	//grab array data
	$action=$data[0];
	if($action=="save_message"){
		//grab array data to save them
		$title=$function->sanitize($data[1]);
		$category=$function->sanitize($data[2]);
		$description=$function->sanitize($data[3]);
		$target=$function->sanitize($data[4]);
		$option=1;
		if(strlen($title)>=3 && strlen($description)>=3 && strlen($category)>0 && strlen($target)>0){
		$table="system_announcements";
		$id_field="ann_id";
		//create location id
		$id=$super->create_id($table,$id_field);
		$action_status=$super->system_messages($option,$id,$title,$category,$target,$description);
		if($action_status){
			echo "1";
		}else{
			echo "0";
		}
		}else{
			echo "Please check subumitted data";
		}
	}elseif($action=="remove_message"){
		$id=$function->sanitize($data[1]);
		$option=2;
		$action_status=$super->system_messages($option,$id,$title,$category,$target,$description);
		if($action_status){
			echo "1";
		}else{
			echo "0";
		}
	}
}else{
	echo "Please check submitted data";
}
?>