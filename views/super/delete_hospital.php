<?php 
if(isset($_POST['hospital_id'])){
	require_once '../../includes/database.inc.php';
	include_once '../../includes/Functions.php';
	include_once '../../controllers/SuperAdmin.php';
	//update hospital sessions
	//sanitize inputs
	$hospital_id=$function->sanitize($_POST['hospital_id']);
	$delete_status=$super->deleteHospital($hospital_id);
	if($delete_status){
		echo "1";
	}else{
		echo "0";
	}
}else{
	echo "error";
}
?>