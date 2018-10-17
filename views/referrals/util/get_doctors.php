<?php 
if(isset($_GET['hospital']) && isset($_GET['department'])){
	require $_SERVER['DOCUMENT_ROOT'].'/referral/module_loader.php';

	$hospital_id=$function->sanitize($_GET['hospital']);
	$department_id=$function->sanitize($_GET['department']);

	//get Doctor from given Hospital and Department
	$result=$admin->getDepartmentDoctors($hospital_id,$department_id);
	echo json_encode($result);
}else{
	echo "500";
}
?>