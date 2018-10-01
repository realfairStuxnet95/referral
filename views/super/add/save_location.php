<?php 
$data=$_POST['info'];
if(is_array($data)){
	require_once '../../../includes/database.inc.php';
	include_once '../../../includes/Functions.php';
	include_once '../../../controllers/SuperAdmin.php';
	$error="";
	$success="1";
	$fail="0";

	//actions
	$option=3;
	$id=5;
	$region_title="NYARUGENDESSSSS";
	$description="sdddddddddddddd";
	$status='ACTIVE';
	//grab array data
	$action=$data[0];
	if($action=="save_location"){
		//grab array data to save them
		$title=$function->sanitize($data[1]);
		$description=$function->sanitize($data[2]);
		$status="ACTIVE";
		if(strlen($title)>=3){
		$table="hospital_regions";
		$id_field="id";
		//create location id
		$location_id=$super->create_id($table,$id_field);
		$save_status=$super->save_hospital_location($location_id,$title,$description,$status);
		if($save_status){
			echo "1";
		}else{
			echo "0";
		}
		}else{
			echo "Please check submitted data and try again";
		}
	}elseif($action=="remove_location"){
		$location_id=$function->sanitize($data[1]);
		$action_status=$super->hospitals_locations(2,$location_id,$region_title,$description,$status);
		if($action_status){
			echo "1";
		}else{
			echo "0";
		}
	}
	else{
		echo "404";
	}
}else{
	echo "Please check submitted data";
}
?>