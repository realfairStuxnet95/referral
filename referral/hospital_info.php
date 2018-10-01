<?php 
if(isset($_POST['hospital'])){
	require_once '../includes/database.inc.php';
	include_once '../controllers/Hospital.inc.php';
    include_once '../controllers/HospitalAdmin.php';
	include_once '../includes/Functions.php';

	//sanitize data
	$hospital_name=$function->sanitize($_POST['hospital']);
	$result=array();
	$result=$hospital->get_hospital($hospital_name);
	if(count($result)>0){
		foreach ($result as $key => $value) {
			?>
					<div class="uk-width-medium-1-1">
						<input type="text" class="md-input" value="<?php echo $value['hospital_name']; ?>" name="" disabled>
						<input type="hidden" id="to_hospital_id" value="<?php echo $value['hospital_id']; ?>" name="to_hospital_id">
					</div>
                    <div class="uk-width-medium-1-2">
                        <label>Hospital Category</label>
                        <select class="md-input" disabled>
                            <option value="<?php echo $value['category'] ?>">
                            <?php 
                            echo $hospital->get_hospital_category($value['category']);
                            ?>
                           </option>
                        </select>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <label>Department</label>
                        <select id="department" name="department" class="md-input">
                        	<?php 
                        	 $departments=array();
                        	 $departments=$hospital->get_departments($value['hospital_id']);
                        	 foreach ($departments as $key => $value1) {
                        	 	?>
                        	 	<option value="<?php echo $value1['name'] ?>">
                        	 	<?php echo $admin->get_department_name($value1['name']); ?>
                        	 </option>
                        	 	<?php
                        	 }
                        	?>
                        </select>
                    </div>
			<?php
		}
	}else{
		echo "No information regarding hospital you searched";
	}
}else{
	echo "error";
}
?>