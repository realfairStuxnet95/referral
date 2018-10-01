<?php 
require 'includes/database.inc.php';
include 'controllers/HospitalAdmin.php';
include 'controllers/User.inc.php';

################################//check email address
// $email_state=$admin->check_rec_email("sam@gmail.com");
// if(!$email_state){
// 	echo "no";
// }else{
// 	echo "yes";
// }
################################//check phone address
// $phone_state=$admin->check_rec_phone("07888998877");
// if(!$phone_state){
// 	echo "no phone";
// }else{
// 	echo "yes";
// }

##############################	 SAVE RECEPTIONIST #############
$rec_id=$admin->create_receptionist_id();
$save_status=$admin->save_receptionist($rec_id,'2','kamanzi','email@gmail.com','test one','kigali','00757689','null','stat(filename)');
if($save_status){
	echo 'saved';
}else{
	echo "not saved";
}
?>