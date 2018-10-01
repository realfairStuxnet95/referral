<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
include_once'../../includes/Functions.php';
require_once '../../includes/database.inc.php';
include_once '../../controllers/Referral.inc.php';
include_once '../../controllers/Doctor.php';
include_once '../../controllers/Hospital.inc.php';
include_once '../../controllers/SuperAdmin.php';

$data=$_POST['info'];
//check if submitted data are array
if(is_array($data)){
	//grab action==doctor id and doctor status
	$doctor_id=$data[0];
	$status=$data[1];

	//check if doctor is in our system
	$check_doctor=$doctor->check_id($doctor_id);
	if($check_doctor){
		//now update the doctor status
		$update_status=$super->updateDoctor($doctor_id,$status);
		if($update_status){
			echo "1";
		}else{
			echo "500";
		}
	}else{
		echo "403";
	}
}else{
	echo "no";
}
}
?>