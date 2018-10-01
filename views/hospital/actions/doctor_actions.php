<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	include '../../../class_loader.php';
	if(isset($_POST['info'])){
		$data=$_POST['info'];
		if(is_array($data)){
			//check for submitted action
			$option=$function->sanitize($data[0]);
			$action=$function->sanitize($data[1]);
			$status=$function->sanitize($data[2]);
			$allowed=array("change_status","delete");
			if(in_array($option, $allowed)){
				if(strlen($status)>0 && strlen($action)>0){
					$action_status=$admin->doctor_actions($option,$action,$status);
					if($action_status){
						echo "1";
					}else{
						die(mysqli_error($con));
					}
				}else{
					echo "403";
				}
			}else{
				echo "500";
			}
		}else{
			echo "Submitted data is not array";
		}
	}else{
		echo "Please check submitted data";
	}
}else{
	echo "error";
}
?>