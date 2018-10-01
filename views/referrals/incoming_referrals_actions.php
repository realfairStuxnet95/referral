<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	require_once '../../auth.php';
	require_once '../../includes/database.inc.php';
	include_once '../../includes/Functions.php';
	include_once '../../controllers/HospitalAdmin.php';
	include_once '../../controllers/Referral.inc.php';
	include_once '../../controllers/Doctor.php';

	$data=$_POST['info'];
	$options=0;
	$referral_id=0;
	if(is_array($data)){
		$action=$function->sanitize($data[0]);
		$referral_id=$function->sanitize($data[1]);
		if(strlen($action)>0 && strlen($referral_id)>0){
			if($action=="PENDING"){
				$options=3;
			}elseif($action=="SCHEDULED"){
				$options=2;
			}elseif ($action=="RECEIVED") {
				$options=1;
			}
			$action_status=$referral->referral_actions($options,$referral_id);
			if($action_status){
				echo "1";
			}else{
				die(mysqli_error($con));
			}
		}else{
			echo "Please submit an action";
		}
	}else{
		echo "Please submit an array";
	}
}else{
	echo "error";
}
?>