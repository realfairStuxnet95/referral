<?php 
if(isset($_POST['name']) && isset($_POST['description'])){
require '../../../includes/database.inc.php';
include '../../../includes/Functions.php';
include '../../../controllers/HospitalAdmin.php';
include '../../../controllers/User.inc.php';
$name=$function->sanitize($_POST['name']);
$description=$function->sanitize($_POST['description']);
$user_id=$function->sanitize($_POST['hos_id']);
//get the hospital id from hospital admin
$hos_id=$user->get_user_hospital_id($user_id);

//create new department id
$data=$admin->create_deparment_id();

//check if department do not exist
$check=$admin->check_department($hos_id,$name);
if($check==false){
//save hospital department
$state=$admin->add_department($data,$hos_id,$name,$description);
if($state){
	echo "1";
}else{
	echo "0";
}	
}else{
	echo "exist";
}

}else{
	echo "error";
}
?>