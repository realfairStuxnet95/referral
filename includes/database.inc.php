<?php
$server="localhost";
$user="root";
$password="";
$database="doctor";
$con=mysqli_connect($server,$user,$password);
if($con){
	$db=mysqli_select_db($con,$database);
	if(!$db){
		die("Something went wrong Please contact system Admin.");//echo "online connected";
	}
}
?>