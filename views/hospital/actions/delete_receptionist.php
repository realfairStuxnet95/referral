<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	require_once '../../../includes/database.inc.php';
	include_once '../../../includes/Functions.php';
	include_once '../../../controllers/HospitalAdmin.php';

	$data=$_POST['info'];
	$receptionist_id=$data[0];
	
	$delete_status=$admin->deleteReceptionist($receptionist_id);
	if($delete_status){
		echo "1";
	}else{
		echo "0";
	}
}else{
	echo "error";
}
?>