<?php 
$data=$_POST['info'];
if(is_array($data)){
	include '../../../class_loader.php';
	$error="";
	$success="1";
	$fail="0";

	//actions
	$option=1;
	$id=9;
	$transport_name="";
	$description="";
	//grab array data
	$action=$data[0];
	if($action=="save_transport"){
		//grab array data to save them
		$transport_name=$function->sanitize($data[1]);
		if(strlen($transport_name)>=3){
		$table="transport_mode";
		$id_field="id";
		//create location id
		$id=$super->create_id($table,$id_field);
		$save_status=$super->transport_mode_actions($option,$id,$transport_name);
		if($save_status){
			echo "1";
		}else{
			echo "0";
		}
		}else{
			echo "Please check submitted data and try again";
		}

	}elseif($action=="remove_transport"){
		$id=$function->sanitize($data[1]);
		$option=2;
		$action_status=$super->transport_mode_actions($option,$id,$transport_name);
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