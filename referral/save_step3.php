<?php 
if(isset($_POST['admission_date']) && isset($_POST['stay_length']) && isset($_POST['transfer_date'])){
	//include modules
	require_once '../includes/database.inc.php';
	include_once '../controllers/Referral.inc.php';
	include_once '../includes/Functions.php';

	//sanitize form data
	$admission_date=$function->sanitize($_POST['admission_date']);
	$stay_length=$function->sanitize($_POST['stay_length']);
	$transfer_date=$function->sanitize($_POST['transfer_date']);
	$transfer_reason=$function->sanitize($_POST['transfer_reason']);
	$patient_diagnostic=$function->sanitize($_POST['patient_diagnostic']);
	$patient_history=$function->sanitize($_POST['patient_history']);
	$past_medical=$function->sanitize($_POST['past_medical']);
	$summary=$function->sanitize($_POST['summary']);
	$referral_id=$function->sanitize($_POST['referral']);
	//check if there are some attachments added there
	$isRefferalValid=$referral->check_referral_id($referral_id);
	if($isRefferalValid){

		//save data into database
		$update_status=$referral->step3($referral_id,$admission_date,$stay_length,$transfer_date,
			$transfer_reason,$patient_diagnostic,$patient_history,$past_medical,$summary,'yes','PENDING');
		if($update_status){
			echo "1";
		}else{
			mysqli_error($con);
		}
	}else{
		echo "error this referral is invalid";
	}
}else{
	echo "error";
}
?>