<?php 
require 'includes/database.inc.php';
include 'controllers/HospitalAdmin.php';
include 'controllers/User.inc.php';
include 'controllers/Doctor.php';
include 'controllers/Referral.inc.php';
#########save doctor ###############################
// $doctor_id=$admin->create_doctor_id();
// $state=$admin->save_doctor($doctor_id,"2","Mnaikiza","samuel@gmail.com","12345","kigali/kacyiru","+1234567890","Cardiology","PENDING");
// if($state){
// 	echo "doctor saved successfully";
// }else{
// 	echo "error";
// }

#############DISPLAY ALL HOSPITAL DOCTOR RECORDS###################
// $doctors=array();
// $doctors=$admin->get_all_doctors(1);
// var_dump($doctors);
$update_state=$referral->step3(13,"12/12/12",
		"12","10/10/11",'welcome to hospital','Umutwe udakira nibindi',
		'Gufata ibintu byose','Imiti yose','agomba kuvurwa','yes',
		'pending');
if($update_state){
	echo "updated";
}else{
	die(mysqli_error($con));
}
?>