<?php 
if(isset($_POST['data'])){
require '../../../includes/database.inc.php';
include '../../../includes/Functions.php';
include '../../../controllers/HospitalAdmin.php';

//sanitize inputs
$name=$function->sanitize($_POST['data']);
$description=$admin->get_department_description($name);

echo $description;
}else{
	echo "error";
}
?>