<?php
 $id=$_SESSION['user_id'];
 $type=$_SESSION['user_type'];
 if($type=='SuperAdmin'){
    //check if superadmin id exists
    require 'includes/database.inc.php';
    include 'controllers/System.php';
    include 'controllers/SuperAdmin.php';
    $isAdmin=$super->check_id($id);
    if($isAdmin){
        include 'menu/SuperAdmin.php';
    }
 }else{
 	if($type=="HospitalAdmin"){
 		//check if HospitalAdmin id exists
 		require 'includes/database.inc.php';
 		include 'controllers/User.inc.php';
 		$isHospitalAdmin=$user->check_id($id);
 		if($isHospitalAdmin){
 			include 'menu/HospitalAdmin.php';
 		}
 	}else if($type=="doctor"){
 			include 'menu/Doctor.menu.php';
 	}
 }
?>
