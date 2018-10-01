<?php 
if(isset($_POST['hospital_name']) && isset($_POST['to_hos_name'])){
	//include modules
	require_once '../includes/database.inc.php';
	include_once '../controllers/Referral.inc.php';
	include_once '../includes/Functions.php';
	//sanitize form data
	$from_hospital_name=$function->sanitize($_POST['hospital_name']);
	$to_hospital_name=$function->sanitize($_POST['to_hos_name']);
	$physician_name=$function->sanitize($_POST['physician_name']);
	$physician_phone=$function->sanitize($_POST['physician_phone']);
	$mode_of_transport=$function->sanitize($_POST['transportation']);
	$department=$function->sanitize($_POST['department']);
	$to_hospital_id=$function->sanitize($_POST['to_hospital_id']);
	$from_hospital_id=$function->sanitize($_POST['from_hospital_id']);
	$referral_id=(int)$function->sanitize($_POST['referral']);

	$isRefferalValid=$referral->check_referral_id($referral_id);
	if($isRefferalValid){

		//validate them and save into database
		$department=$function->removeSpace($department);
		$update_status=$referral->step2($referral_id,$from_hospital_name,$from_hospital_id,
			$to_hospital_name,$physician_name,$physician_phone,$to_hospital_id,$mode_of_transport,
			$department);
		if($update_status){
			echo "1";
		}else{
			die(mysqli_error($con));
		}
	}else{
		echo "not";
	}
}else{
	echo "error";
}
?>