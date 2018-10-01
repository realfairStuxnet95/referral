<?php 
session_start();
    if(!isset($_SESSION['user_id']) && !isset($_SESSION['user_type']) && !isset($_SESSION['names'])){
    	header("Location:access");
    }else{
    	$user_id=$_SESSION['user_id'];
    	$user_type=$_SESSION['user_type'];
    	$names=$_SESSION['names'];
    	if($user_type!="SuperAdmin"){
			require 'includes/database.inc.php';
			include 'controllers/User.inc.php';

			//update user status and clean session
		 $status=$user->change_status($user_id,'NO');
		 if($status){
		 //unset session
		 unset($_SESSION['user_id']);
		 unset($_SESSION['user_type']);
		 unset($_SESSION['names']);
		 //destroy session
		 session_destroy();
		 header("Location:access");
		}else{
			echo "error_log(message)";
		}
    	}else{
			require 'includes/database.inc.php';
			include 'controllers/User.inc.php';
			include 'controllers/SuperAdmin.php';

			//update user status and clean session
		$admin_status=$super->update_status($user_id,'no');
		if($admin_status){
		 //unset session
		 unset($_SESSION['user_id']);
		 unset($_SESSION['user_type']);
		 unset($_SESSION['names']);
		 //destroy session
		 session_destroy();
		 header("Location:access");
		}else{
			echo "errors";
		}
    	}
    }
?>