<?php
// include 'class_loader.php';
// $option="change_status";
// $action="9";
// $status="ACTIVATED";

// var_dump($referral->ongoing_dates());
$conn=mysqli_connect("localhost","api_access","Stuxnet7268","doctor");
if($conn){
	echo "Connected to Database";
}else{
	die(mysqli_error($conn));
}
?>