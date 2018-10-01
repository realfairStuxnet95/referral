<?php 
if(isset($_POST['data'])){
require '../includes/database.inc.php';
include '../includes/Functions.php';
include '../controllers/Hospital.inc.php';

$name=$function->sanitize($_POST['data']);
$result=$hospital->check_name($name);
if($result==true){
	echo "1";
}else{
	echo "0";
}
}else{
	echo "error";
}
?>