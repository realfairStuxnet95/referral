<?php
if(isset($_POST['user_type'])){
require_once '../../../includes/database.inc.php';
include_once '../../../includes/Functions.php';
include_once '../../../controllers/HospitalAdmin.php';
include_once '../../../controllers/User.inc.php';
$user_type=$function->sanitize($_POST['user_type']);
//get system alerts
$alert=array();
$alert=$admin->get_system_alert($user_type);
if(count($alert)>0){
	foreach ($alert as $key => $value) {
		?>
		<h1 style="color: #009966;" class='heading_a'><?php echo $value['title']; ?></h1>
		<blockquote>
			<?php 
			if($value['category']=="NOTIFICATION"){
				?>
			<img src='assets/system_icons/alerts/notification.png' style="max-height: 150px;" />
				<?php
			}
			?>
			<?php echo $value['description']; ?>
		</blockquote>
		
		<?php
	}
}else{
	echo "0";
}
}else{
	echo "404";
}
?>