<?php
$data=$_POST['info'];
if(is_array($data)){
	include '../../../class_loader.php';
	//check action submitted
	$action=$function->sanitize($data[0]);
	$input=$function->sanitize($data[1]);
	$allowed=array("*","by_search","by_status","by_location","by_category");
	if(in_array($action,$allowed)){
		displayResult($action,$input,$super);
	}else{
		echo "500";
	}
}else{
	echo "error";
}
function displayResult($action,$input,$super){
	$result=array();
	$result=$super->hospital_information($action,$input);
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
                    <option value="" disabled selected hidden>Filter Category</option>
		            <?php 
		            $informations=array();
		            $informations=$super->get_hospital_categories();
		            foreach ($informations as $key => $value) {
		                ?>
		                <option value="<?php echo $value['id']; ?>"><?php echo $value['category_name']; ?></option>
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
        <th class="uk-width-1-10 uk-text-center">Hospital code</th>
        <th class="uk-width-2-10">Hospital</th>
        <th class="uk-width-2-10 uk-text-center">Director Names</th>
        <th class="uk-width-1-10 uk-text-center">Status</th>
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
            <td><?php echo $value['hospital_code']; ?></td>
            <td class="uk-text-center"><?php echo $value['hospital_name']; ?></td>
            <td class="uk-text-center"><?php echo $value['director_name']; ?></td>
            <td class="uk-text-center"><span class="uk-badge uk-badge-primary">
                <?php echo $value['status']; ?>
            </span></td>
            <td class="uk-text-center">
                <a class="edit" status="<?php echo $value['status']; ?>" action="<?php echo $value['hospital_id']; ?>" data-uk-tooltip title="<?php 
                    if($value['status']=="PENDING"){
                        echo "Activate Hospital";
                    }elseif($value['status']=="ACTIVATED"){
                        echo "Desactivate Hospital";
                    }
                 ?>">
                   <?php 
                   if($value['status']=="PENDING"){
                    ?>
                    <i style="color: orange;" class="md-icon material-icons">edit</i>
                    <?php
                   }elseif($value['status']=="ACTIVATED"){
                    ?>
                    <i style="color: green;" class="md-icon material-icons">close</i></a>
                    <?php
                   }else{
                    ?>
                    <i style="color: red;" class="md-icon material-icons">warning</i></a>
                    <?php
                   }
                   ?>
                <a class="delete" href="#" action="<?php echo $value['hospital_id']; ?>">
                    <font style="font-size: 18px;color: red;">
                    <i class="md-icon material-icons fa fa-trash-o"></i>
                    </font>
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
<script src="assets/js/super/hospitals.js"></script>