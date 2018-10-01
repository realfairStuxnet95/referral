<?php 
require 'includes/database.inc.php';
include 'controllers/HospitalAdmin.php';
include 'controllers/User.inc.php';

###########create nurse id##################
// $nurse_id=$admin->create_nurse_id();
// echo $nurse_id;
###########check nurse phone ###############
// $phone_state=$admin->check_nurse_phone("078889988");
// if($phone_state){
// 	echo "exists";
// }else{
// 	echo "not exists";
// }
###########check nurse email ###############
// $email_state=$admin->check_nurse_email("sam@gmail.com");
// if($email_state){
// 	echo "email exists";
// }else{
// 	echo "email not exists";
// }
########### save nurse informations ##############
// $nurse_id=$admin->create_nurse_id();
// $save_status=$admin->save_nurse($nurse_id,"2",'samuel','sam@gmail.com','samuels','kigali/city','0788998866','ACTIVE');
// if($save_status){
// 	echo "saved";
// }else{
// 	echo "not saved";
// }
########### Get all nurses informations #############
$result=array();
$result=$admin->get_nurses();
var_dump($result);
?>