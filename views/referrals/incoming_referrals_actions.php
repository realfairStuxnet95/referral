<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	require_once '../../module_loader.php';
	$data=$_POST['info'];
	if(is_array($data)){

		$action=$function->sanitize($data[0]);
		$referral_id=(int)$function->sanitize($data[1]);

		if($action=="PENDING"){
			$status=$referral->referral_actions(2,$referral_id);

		}elseif($action=="RECEIVED"){
			$status=$referral->referral_actions(1,$referral_id);
			
		}elseif($action=="SCHEDULED"){
			//grab inputs
			$date_field=$function->sanitize($data[2]);
			$time_field=$function->sanitize($data[3]);
			$department=$function->sanitize($data[4]);
			$doctor=$function->sanitize($data[5]);
			$receive_hospital=$function->sanitize($data[6]);

			$status=$referral->scheduleReferral($referral_id,$receive_hospital,$date_field,$time_field,$department,$doctor);
		}else{
			$status=false;
		}
		if($status){
			echo "1";
		}else{
			echo "0";
		}

	}else{
		echo "Please submit an array";
	}
}else{
	echo "error";
}
?>