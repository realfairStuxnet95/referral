<?php
$server="localhost";
$user="api_access";
$password="Stuxnet7268";
$database="doctor";
$con=mysqli_connect($server,$user,$password);
if($con){
	$db=mysqli_select_db($con,$database);
	if($db){
		//echo "online connected";
	}
}else{
	$con=mysqli_connect("localhost","root","");
	if($con){
		$db=mysqli_select_db($con,"doctor");
		if($db){
			echo "connected";
		}else{
			die(mysqli_error($con));
		}
	}
}
?>