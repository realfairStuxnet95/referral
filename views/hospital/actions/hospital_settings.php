<?php
sleep(5);
$data=$_POST['info'];
if(is_array($data)){
	require_once '../../../includes/database.inc.php';
	include_once '../../../includes/Functions.php';
	include_once '../../../controllers/HospitalAdmin.php';
	//actions
	$action=$data[0];

	if($action=="save_settings"){
		$hospital_id=$data[7];
		$hospital_name=$function->sanitize($data[1]);
		$slogan=$function->sanitize($data[2]);
		$address_location=$function->sanitize($data[3]);
		$phone=$function->sanitize($data[4]);
		$email=$function->sanitize($data[5]);
		$description=$function->sanitize($data[6]);

		$action_status=$admin->update_hospital_settings($hospital_id,$hospital_name,$slogan,$address_location,$phone,$email,$description);
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