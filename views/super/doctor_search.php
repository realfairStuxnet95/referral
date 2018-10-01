<?php
sleep(3);
include_once'../../includes/Functions.php';
require_once '../../includes/database.inc.php';
include_once '../../controllers/Referral.inc.php';
include_once '../../controllers/Doctor.php';
include_once '../../controllers/Hospital.inc.php';
include_once '../../controllers/SuperAdmin.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//echo "submitted";
	$data=$_POST['info'];
	if(is_array($data)){
		$department;
		$hospital;

		$department=$data[0];
		$hospital=$data[1];
		$search=$data[2];
		$status=$data[3];
		$result=array();

		//CHECK DATA AND SEND REQUEST
		if(strlen($department)>0 && strlen($hospital)){
			$result=$super->search_doctors($department,$hospital,$search,$status);
			?>
<table class="uk-table uk-table-nowrap table_check">
    <thead>
    <tr>
        <th class="uk-width-1-10 uk-text-center small_col"><input type="checkbox" data-md-icheck class="check_all"></th>
        <th class="uk-width-2-10">Profile</th>
        <th class="uk-width-2-10">Names</th>
        <th class="uk-width-2-10 uk-text-center">Email</th>
        <th class="uk-width-1-10 uk-text-center">Phone</th>
        <th class="uk-width-1-10 uk-text-center">Department</th>
        <th class="uk-width-2-10 uk-text-center">Status</th>
        <th class="uk-width-2-10 uk-text-center">Actions</th>
    </tr>
    </thead>
    <tbody>
        <?php 
        foreach ($result as $key => $value) {
            //display records
            ?>
        <tr>
            <td class="uk-text-center uk-table-middle small_col">
                <input type="checkbox" data-md-icheck class="check_row">
            </td>
            <td class="uk-text-center">
                <?php 
                //check if profile not equal null
                if($value['profile_image']!="null"){
                    ?>
                    <img class="md-user-image" src="system_images/profiles/<?php echo $value['profile_image'];?>" alt=""/>
                    <?php
                }else{
                    ?>
                    <img class="md-user-image" src="assets/img/avatars/avatar_01_tn.png" alt=""/>
                    <?php
                }
                ?>
            </td>
            <td><?php echo $value['names']; ?></td>
            <td class="uk-text-center">
                <?php echo $value['email']; ?>
            </td>
            <td class="uk-text-center">
                <?php echo $value['phone']; ?>
            </td>
            <td class="uk-text-center">
                <?php echo $value['department']; ?>
            </td>
            <td class="uk-text-center">
                <span class="uk-badge uk-badge-primary">
                    <?php echo $value['status']; ?>
                </span>
            </td>
            <td class="uk-text-center">
                <a class="btn_update"
                    status="<?php echo $value['status']; ?>"
                    action="<?php echo $value['doctor_id']; ?>"
                <?php
                 if($value['status']=="PENDING"){
                    ?>
                    data-uk-tooltip title="Activate This doctor"
                    <?php
                 }else{
                    ?>
                    data-uk-tooltip title="Desactivate This doctor"
                    <?php
                 }
                 ?> href="#"><i class="md-icon material-icons">&#xE254;</i></a>
                <a href="#"><i class="md-icon material-icons">&#xE88F;</i></a>
            </td>
        </tr>
            <?php
        }
        ?>

    </tbody>
</table>
			<?php
		}else{
			echo $hospital;
		}
	}else{
		echo "no";
	}
}
?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/loader/post_loader.js"></script>
<script src="assets/js/super/doctors.js"></script>