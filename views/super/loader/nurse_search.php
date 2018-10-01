<?php

$data=$_POST['info'];
if(is_array($data)){
	include '../../../class_loader.php';
	//check action submitted
	$action=$function->sanitize($data[0]);
	$table=$function->sanitize($data[1]);
	$input=$function->sanitize($data[2]);
	$result=array();
	$tables=array("nurses","receptionists");
	$allowed=array("*","by_search","by_status","by_hospital");
	if(in_array($action, $allowed)){
		if(in_array($table,$tables)){
			displayResult($table,$action,$input,$super);
		}else{
			echo "500";
		}
	}else{
		echo "500";
	}
}else{
	echo "error";
}

function displayResult($table,$action,$input,$super){
$result=array();
$result=$super->nurse_receptionist($table,$action,$input);
?>
<div class="uk-grid" data-uk-grid-margin>
     <div class="uk-width-1-2">
        <button class="uk-button uk-button-danger uk-button-large">EXPORT PDF</button>
    </div>
</div>
<div class="md-card">
    <div class="md-card-content">
        <div style="margin: 0px;" class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-4">
                    <select id="select_hospitals" class="md-input" data-uk-tooltip="{pos:'left'}" title="Filter with Hospitals">
                    <option value="" disabled selected hidden>Filter Hospitals</option>
                    <?php 
                    $hospitals=array();
                    $hospitals=$super->get_hospitals("*",0);
                    foreach ($hospitals as $key => $value) {
                        ?>
                        <option value="<?php echo $value['hospital_id'];?>">
                            <?php echo $value['hospital_name']; ?>
                        </option>
                        <?php
                    }
                    ?>
                    </select>
                    <input type="hidden" id="table" value="<?php echo $table; ?>" name="">
                </div>
                <div class="uk-width-medium-1-4">
                    <select id="select_status" class="md-input" data-uk-tooltip="{pos:'left'}" title="Filter with Status">
                        <option value="" disabled selected hidden>Filter Status</option>
                        <option value="PENDING">PENDING</option>
                        <option value="ACTIVATED">ACTIVATED</option>
                        <option value="DELETED">DELETED</option>
                    </select>
                </div>
                 <div class="uk-width-medium-1-2">
                    <div class="uk-input-group">
                        <input id="txt_search" type="text" class="md-input" placeholder="search here and press enter....." />
                        <span class="uk-input-group-addon">
                            <a class="search"><i class="fa fa-search"></i></a>
                        </span>
                    </div>
                 </div>
        </div>
    </div>
</div>
<?php
if(count($result)>0){
	?>
<table class="uk-table uk-table-nowrap table_check">
    <thead>
    <tr>
        <th class="uk-width-1-10 uk-text-center small_col"><input type="checkbox" data-md-icheck class="check_all"></th>
        <th class="uk-width-2-10">Profile</th>
        <th class="uk-width-2-10">Names</th>
        <th class="uk-width-2-10 uk-text-center">Email</th>
        <th class="uk-width-1-10 uk-text-center">Phone</th>
        <th class="uk-width-2-10 uk-text-center">Status</th>
        <th class="uk-width-2-10 uk-text-center">Actions</th>
    </tr>
    </thead>
    <tbody>
    	<?php 
    	foreach ($result as $key => $value) {
    		?>
        <tr>
            <td class="uk-text-center uk-table-middle small_col">
                <input type="checkbox" data-md-icheck class="check_row">
            </td>
            <td class="uk-text-center">
                <?php 
                //check if profile not equal null
                if($value['profile_image']!="null" && $value['profile_image']!=""){
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
                <span class="uk-badge uk-badge-primary">
                    <?php echo $value['status']; ?>
                </span>
            </td>
            <td class="uk-text-center">
                <a class="delete" target="<?php echo $table; ?>" action="<?php echo (($table=='nurses')?$value['nurse_id']:$value['receptionist_id']);?>">
                    <i class="md-icon material-icons">delete</i>
                </a>
            </td>
        </tr>
    		<?php
    	}
    	?>
    </tbody>
</table>
	<?php
}else{
	?>
    <div class="uk-alert uk-alert-danger" data-uk-alert>
        <a href="#" class="uk-alert-close uk-close"></a>
        No Data found.
    </div>
	<?php
}
}
?>

<script src="assets/js/loader/post_loader.js"></script>
<script src="assets/js/super/nurse_receptionist.js"></script>