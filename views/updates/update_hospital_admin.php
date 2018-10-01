<?php 
if(isset($_POST['user_names']) && isset($_POST['user_password'])){
	require 'includes/database.inc.php';
	include 'controllers/User.inc.php';
	include 'includes/Functions.php';

	$user_names=$function->sanitize($_POST['user_names']);
	$user_password=$function->sanitize($_POST['user_password']);
	$user_id=$function->sanitize($_POST['user_id']);
}else{
	echo "error";
}
?>