<?php
if(isset($_POST['hospital_name']) && isset($_POST['hospital_region']) && isset($_POST['director_names']))
{
	require 'includes/database.inc.php';
	include 'includes/Functions.php';
	include 'controllers/Hospital.inc.php';
	include 'controllers/User.inc.php';
	include 'session/Session.php';
	//capture data from form
	$hospital_name=$function->sanitize($_POST['hospital_name']);
	$hospital_region=$function->sanitize($_POST['hospital_region']);
	$hospital_category=$function->sanitize($_POST['hospital_category']);
	$director_names=$function->sanitize($_POST['director_names']);
	$phone=$function->sanitize($_POST['phone']);
	$email=$function->sanitize($_POST['email']);
	$director_password=$function->sanitize($_POST['director_password']);
	$new_id=$hospital->create_id();
	$code=$hospital->create_code();
	$code+=$hospital->create_id();
	//todo here
	#CHECK IF HOSPITAL NAME IS AVAILABLE
	#CHECK IF HOSPITAL PHONE IS AVAILABLE
	#CHECK IF HOSPITAL CODE IS AVAILABLE

	//SAVE INFORMATION INTO DATABASE
$save=$hospital->save_hospital($new_id,$code,$hospital_name,$hospital_category,$hospital_region,$director_names,$phone,$email,$director_password);
if($save){
	//save hospital admin information to user table
	//generate new user id.
	$user_id=$user->create_user_id();
	$save_user=$user->save_hospital_admin($user_id,$director_password,$director_names,$new_id);
	if($save_user){
		//start user session
		session_start();
		//set registration session
		$session->set_register_session($user_id,$director_names);
		echo "1";
	}else{
		echo "2";
	}
	//start session and send user to finish information activity
}else{
	echo "0";
}
}else{
	echo "error";
}
?>