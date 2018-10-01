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
	$option=1;
	$id=9;
	$category_name="";
	$description="";
	//grab array data
	$action=$data[0];
	if($action=="save_category"){
		//grab array data to save them
		$category_name=$function->sanitize($data[1]);
		$description=$function->sanitize($data[2]);
		if(strlen($category_name)>=3){
		$table="hospitals_category";
		$id_field="id";
		//create location id
		$id=$super->create_id($table,$id_field);
		$save_status=$super->hospitals_categories($option,$id,$category_name,$description);
		if($save_status){
			echo "1";
		}else{
			echo "0";
		}
		}else{
			echo "Please check submitted data and try again";
		}

	}elseif($action=="remove_category"){
		$id=$function->sanitize($data[1]);
		$option=2;
		$action_status=$super->hospitals_categories($option,$id,$category_name,$description);
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