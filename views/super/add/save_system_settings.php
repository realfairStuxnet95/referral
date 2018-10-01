<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$server_url = $_SERVER["SERVER_NAME"];
require_once '../../../includes/database.inc.php';
include_once '../../../controllers/System.php';
$data=$_POST['info'];
$name=$data[0];
$title=$data[1];
$description=$data[2];
$email=$data[3];
$address=$data[4];
$phone=$data[5];

//save them into database
$save_status=$system->save_system($name,$title,$address,$phone,$email,$description);
if($save_status){
	echo "1";
}else{
	echo "0";
}
}
?>