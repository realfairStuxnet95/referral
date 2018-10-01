<?php

//check if data are being submited
if(isset($_POST['doctor_names']) AND isset($_POST['doctor_email']) AND isset($_POST['hos_id']))
{
	//load modules
require '../../../includes/database.inc.php';
include '../../../includes/Functions.php';
include '../../../controllers/HospitalAdmin.php';
include '../../../controllers/User.inc.php';

//sanitize form post data
$doctor_names=$function->sanitize($_POST['doctor_names']);
$doctor_email=$function->sanitize($_POST['doctor_email']);
$doctor_password=$function->sanitize($_POST['doctor_password']);
$doctor_phone=$function->sanitize($_POST['doctor_phone']);
$doctor_address=$function->sanitize($_POST['doctor_address']);
$doctor_department=$function->sanitize($_POST['doctor_department']);
$user_id=$function->sanitize($_POST['hos_id']);
//get the hospital id from hospital admin
$hos_id=$user->get_user_hospital_id($user_id);
//check if doctor email do not exist
$email_state=$admin->check_email($doctor_email);
if($email_state==false){
	//check doctor phone number
	$phone_status=$admin->check_phone($doctor_phone);
	if($phone_status==false){
		//now we can save record
		##### SAVE DOCTOR RECORD IN DATABASE
		$doctor_id=$admin->create_doctor_id();
		$save_state=$admin->save_doctor($doctor_id,$hos_id,$doctor_names,$doctor_email,$doctor_password,$doctor_address,$doctor_phone,$doctor_department,"PENDING");
		//check if doctor saved successfully
		if($save_state){
			echo "saved";
		}else{
			echo "something went wrong while registering Please contact your system admin.";
		}
	}else{
		echo $doctor_phone;
	}
}else{
	//email exists
	echo "email exists";
}
//check if doctor phone do not exist
}else{
	echo "error";
}
?>