<?php
//upload.php
if($_FILES["file"]["name"] != '')
{
	//include modules
require_once '../../includes/database.inc.php';
include_once '../../includes/Functions.php';
include_once '../../controllers/Doctor.php';
include_once '../../controllers/User.inc.php';
 $test = explode('.', $_FILES["file"]["name"]);
 $ext = end($test);
 $name = rand(1000, 99999) . '.' . $ext;
 $user_id=$function->removeSpace($_POST['user_id']);
  $user_type=$function->removeSpace($_POST['user_type']);

  //check user type
  if($user_type=="doctor"){
  	//check if doctor id is registered
  	$isDoctor=$doctor->check_id($user_id);
  	if($isDoctor){
  		//now upload data and save them into database
		 $location = '../../system_images/profiles/' . $name;  
		 if(move_uploaded_file($_FILES["file"]["tmp_name"], $location)){
		 	//save data into database
		 	$save_status=$doctor->setProfile($user_id,$name);
		 	if($save_status){
		 		echo "1";
		 	}else{
		 		die(mysqli_error($con));
		 	}
		 }
  	}
  }
}
?>