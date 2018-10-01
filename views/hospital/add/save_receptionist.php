<?php 
//check if data are being submited
if(isset($_POST['rec_names']) AND isset($_POST['rec_email']) AND isset($_POST['hos_id']))
{
	//load modules
require '../../../includes/database.inc.php';
include '../../../includes/Functions.php';
include '../../../controllers/HospitalAdmin.php';
include '../../../controllers/User.inc.php';
//sanitize data from form
$rec_names=$function->sanitize($_POST['rec_names']);
$rec_email=$function->sanitize($_POST['rec_email']);
$rec_password=$function->sanitize($_POST['rec_password']);
$rec_phone=$function->sanitize($_POST['rec_phone']);
$rec_address=$function->sanitize($_POST['rec_address']);
$user_id=$function->sanitize($_POST['hos_id']);
//get the hospital id from hospital admin
$hos_id=$user->get_user_hospital_id($user_id);

###########CHECK RECEPTIONIST EMAIL IF NOT ALREADY EXISTS
$email_state=$admin->check_rec_email($rec_email);
if(!$email_state){
	####### CHECK RECEPTIONIST PHONE ###########
	$phone_state=$admin->check_rec_phone($rec_phone);
	if(!$phone_state){
		#############CREATE NEW ID AND SAVE RECORDS
		$rec_id=$admin->create_receptionist_id();
		$save_status=$admin->save_receptionist($rec_id,$hos_id,$rec_names,$rec_email,$rec_password,$rec_address,$rec_phone,'null','PENDING');
		if($save_status){
			echo "1";
		}else{
			echo "Contact system administrator there was an error";
		}
	}else{
		echo "Phone already exists";
	}
}else{
	echo "email already exists";
}
}else{
	echo "error";
}
?>