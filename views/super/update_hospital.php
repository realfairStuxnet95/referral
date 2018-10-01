<?php 
if(isset($_POST['hospital_id']) && isset($_POST['hospital_status'])){
	require_once '../../includes/database.inc.php';
	include_once '../../includes/Functions.php';
	include_once '../../controllers/SuperAdmin.php';
	//update hospital sessions
	//sanitize inputs
	$hospital_id=$function->sanitize($_POST['hospital_id']);
	$hospital_status=$function->sanitize($_POST['hospital_status']);
	$update_status=$super->updateHospital($hospital_id,$hospital_status);
	if($update_status){
		echo "1";
	}else{
		echo "0";
	}
}else{
	echo "error";
}
?>