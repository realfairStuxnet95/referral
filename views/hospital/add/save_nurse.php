<?php

//check if data are being submited
if(isset($_POST['nurse_names']) AND isset($_POST['nurse_email']) AND isset($_POST['hos_id']))
{
	//load modules
require '../../../includes/database.inc.php';
include '../../../includes/Functions.php';
include '../../../controllers/HospitalAdmin.php';
include '../../../controllers/User.inc.php';
//sanitize data from form
$nurse_names=$function->sanitize($_POST['nurse_names']);
$nurse_email=$function->sanitize($_POST['nurse_email']);
$nurse_password=$function->sanitize($_POST['nurse_password']);
$nurse_phone=$function->sanitize($_POST['nurse_phone']);
$nurse_address=$function->sanitize($_POST['nurse_address']);
$user_id=$function->sanitize($_POST['hos_id']);
//get the hospital id from hospital admin
$hos_id=$user->get_user_hospital_id($user_id);

######CHECK NURSE EMAIL IF NOT EXIST
$email_state=$admin->check_nurse_email($nurse_email);
if(!$email_state){
	########CHECK NURSE PHONE IF NOT EXIST
	$phone_state=$admin->check_nurse_phone($nurse_phone);
	if(!$phone_state){
		#######SAVE NURSE AND CREATE NURSE ID
		$nurse_id=$admin->create_nurse_id();
		$save_status=$admin->save_nurse($nurse_id,$hos_id,$nurse_names,$nurse_email,$nurse_password,$nurse_address,$nurse_phone,'PENDING');
		if($save_status){
			echo "1";
		}else{
			echo "error";
		}
	}else{
		echo "Phone already exists";
	}
}else{
	echo "Email already registered";
}
}else{
	echo "error";
}
?>