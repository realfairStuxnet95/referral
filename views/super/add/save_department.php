<?php 
$data=$_POST['info'];
if(is_array($data)){
	require_once '../../../includes/database.inc.php';
	include_once '../../../includes/Functions.php';
	include_once '../../../controllers/SuperAdmin.php';
	//actions
	$option=1;
	$id=1;
	$department="";
	$description="";
	//grab array data
	$action=$data[0];
	if($action=="save_department"){
		//grab array data to save them
		$department=$function->sanitize($data[1]);
		$description=$function->sanitize($data[2]);
		if(strlen($department)>=3){
		$table="system_departments";
		$id_field="id";
		//create location id
		$id=$super->create_id($table,$id_field);
		$action_status=$super->hospitals_deparments($option,$id,$department,$description);
		if($action_status){
			echo "1";
		}else{
			echo "0";
		}
		}else{
			echo "Please check subumitted data";
		}
	}elseif($action=="remove_department"){
		$id=$function->sanitize($data[1]);
		$option=2;
		$action_status=$super->hospitals_deparments($option,$id,$department,$description);
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