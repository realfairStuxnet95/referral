<?php 
$data=$_POST['info'];
if(is_array($data)){
	require_once '../../../includes/database.inc.php';
	include_once '../../../includes/Functions.php';
	include_once '../../../controllers/HospitalAdmin.php';
	//actions
	$option=1;
	$action=$data[0];

	if($action=="remove_department"){
		$id=$function->sanitize($data[1]);
		$option=1;
		$action_status=$admin->department_actions($option,$id);
		if($action_status){
			echo "1";
		}else{
			echo "0";
		}
	}else{
		echo "error";
	}
}else{
	echo "Please check submitted data";
}
?>