<?php 
if(isset($_POST['referral'])){
	require '../class_loader.php';
	$referral_id=$function->sanitize($_POST['referral']);
	$delete_status=$referral->remove_referral($referral_id);
	if($delete_status){
		echo "1";
	}else{
		echo "500";
	}
}else{
	echo "error";
}
?>