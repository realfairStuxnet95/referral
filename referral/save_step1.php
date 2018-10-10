<?php 
if(isset($_POST['patient_fname']) && isset($_POST['patient_lname'])){
	//include modules
	require_once '../includes/database.inc.php';
	include_once '../controllers/Referral.inc.php';
	include_once '../includes/Functions.php';

	//sanitize form data
	$patient_fname=$function->sanitize($_POST['patient_fname']);
	$patient_lname=$function->sanitize($_POST['patient_lname']);
	$patient_id_no=$function->sanitize($_POST['patient_id_no']);
	$patient_phone=$function->sanitize($_POST['patient_phone']);
	$patient_dob=$function->sanitize($_POST['patient_dob']);
	$patient_sex=$function->sanitize($_POST['patient_sex']);
	$guardian=$function->sanitize($_POST['guardian']);
	$guardian_phone=$function->sanitize($_POST['guardian_phone']);
	//create referral id
	$referral_id=$referral->create_referral_id();
	$status=$referral->step1($referral_id,$patient_fname,$patient_lname,$patient_id_no,
		$patient_phone,$patient_dob,$patient_sex,$guardian,$guardian_phone);
	if($status){
		//return the id of referral so we can continue
	echo $referral->get_last_referral_id();
	}else{
		die(mysqli_error($con));
	}
}else{
	echo "error";
}
?>