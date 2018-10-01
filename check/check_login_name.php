<?php 
if(isset($_POST['data'])){
    require '../includes/database.inc.php';
    include '../includes/Functions.php';
	include '../controllers/User.inc.php';
	include '../controllers/SuperAdmin.php';
    include '../controllers/Doctor.php';
	$data=$function->sanitize($_POST['data']);
    $type=$admin->check_user_name($data);
    if($type==false){
    	//check if user is exist
    	$exist=$user->check_user_name($data);
    	if($exist==false){
    		echo '0';
    	}else{
    		echo '1';
    	}
    }else{
    	echo '1';
    }
}
?>