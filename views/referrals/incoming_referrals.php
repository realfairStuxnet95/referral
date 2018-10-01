<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '../../class_loader.php';
	$data=$_POST['info'];
	$referrals=array();
	$hos_id="";
    $id_field="";
	$user_id=$_SESSION['user_id'];
	$user_type=$_SESSION['user_type'];

	if($user_type=="doctor"){
    //get doctor assigned hospital
    $id_field=$doctor->get_doctor_hospital_id($user_id);
    }elseif($user_type=="HospitalAdmin"){
      $id_field=$admin->get_user_hospital($user_id);  
    }

	if(is_array($data)){
	$action=$data[0];
	$field_name='to_hospital_id';
	if(strlen($action)>0){
		switch ($action) {
			case 'PENDINGS':
				$option=1;
				$referrals=$referral->get_referrals_by_status($option,$id_field,$field_name);
				break;
			case 'SCHEDULED':
				$option=2;
				$referrals=$referral->get_referrals_by_status($option,$id_field,$field_name);
				break;
			case 'RECEIVED':
				$option=3;
				$referrals=$referral->get_referrals_by_status($option,$id_field,$field_name);
				break;
		}
		?>
<?php 
if(count($referrals)>0){
?>
<div class="md-card">
        <div class="md-card-content">
            <div style="margin: 0px;" class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-3">
                        <select id="select_demo_2" class="md-input" data-uk-tooltip="{pos:'left'}" title="Filter with department">
                            <option value="" disabled selected hidden>Filter department</option>
                            <option value="a">Item A</option>
                            <option value="b">Item B</option>
                            <option value="c">Item C</option>
                        </select>
                    </div>
                    <div class="uk-width-medium-1-3">
                        <select id="select_demo_2" class="md-input" data-uk-tooltip="{pos:'left'}" title="Filter with department">
                            <option value="" disabled selected hidden>Filter Status</option>
                            <option value="PENDING">PENDING</option>
                            <option value="SENT">SENT</option>
                            <option value="RECEIVED">RECEIVED</option>
                        </select>
                    </div>
                    <div class="uk-width-medium-1-3">
                        <BUTTON class="uk-button uk-button-primary uk-button-large">
                            <i class="fa fa-refresh"></i>
                        </BUTTON>
                    </div>
            </div>
    </div>
</div>
<table class="uk-table uk-table-nowrap table_check uk-table-hover">
    <thead style="background: #F5F5F5;">
    <tr>
        <th class="uk-width-1-10 uk-text-center">Date</th>
        <th class="uk-width-2-10">Patient Info</th>
        <th class="uk-width-2-10 uk-text-center">Referring Provider</th>
        <th class="uk-width-1-10 uk-text-center">Receiving Provider</th>
        <th class="uk-width-2-10 uk-text-center">Status</th>
        <th class="uk-width-2-10 uk-text-center">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php 
    foreach ($referrals as $key => $value) {
        ?>
        
        <tr>
            <td class="uk-text-center">
            <div>
                <div class="md-card-content">
                    <p>
                        <a href="view_referral?key=<?php echo $value['referral_id'] ?>&title=<?php echo $value['patient_fname'] ?>">
                        <?php echo $function->formatDate($value['regDate']); ?>
                    </a>
                    </p>
                </div>
            </div>
            </td>
            <td class="uk-text-center">
                <a style="text-decoration: none;color: #333;" href="view_referral?key=<?php echo $value['referral_id'] ?>&title=<?php echo $value['patient_fname'] ?>">
                <div class="md-card-content">
                <p>
                    <font style="font-weight: bold;">Names:</font> 
                         <font style="color: #0077cc;">
                            <?php echo $value['patient_fname'].' '.$value['patient_lname']; ?>
                        </font>
                </p>
                <p>
                    <font style="font-weight: bold;">Telephone:</font> 
                        <?php echo $value['patient_phone']; ?>
                </p>
                <p>
                    <font style="font-weight: bold;">ID NO:</font>
                     <?php echo $value['patient_id_no']; ?>
                </p>
                </div>
            </a>
            </td>
            <td>
                <a style="text-decoration: none;color: #333;" href="view_referral?key=<?php echo $value['referral_id'] ?>&title=<?php echo $value['patient_fname'] ?>">
                <div class="md-card-content">
                    <p>
                        <font style="font-weight: bold;">
                        Physician Names:
                        </font>
                        <?php echo $value['physician_name']; ?>
                    </p>
                    <p>
                        <font style="font-weight: bold;">
                            Physician Phone:
                        </font>
                            <?php echo $value['physician_phone']; ?>
                    </p>
                    <p>
                        <font style="font-weight: bold;">From Hospital:</font>
                        <?php echo $value['physician_phone']; ?>
                    </p>
                </div>
            </a>
            </td>
            <td>
                <a style="text-decoration: none;color: #333;" href="view_referral?key=<?php echo $value['referral_id'] ?>&title=<?php echo $value['patient_fname'] ?>">
                    <div class="md-card-content">
                        <p>
                            <font style="font-weight: bold;">
                                To hospital:
                            </font>
                            <?php echo $value['to_hospital_name']; ?>
                        </p>
                        <p>
                            <font style="font-weight: bold;">
                                Mode of Transport:
                            </font>
                            <?php echo $value['mode_of_transport']; ?>
                        </p>
                        <p>
                            <font style="font-weight: bold;">
                                Admission Date:
                            </font>
                            <?php echo $value['hospital_admission_date']; ?>
                        </p>
                    </div>
                </a>
            </td>
            <td>
                <div>
                    <div class="md-card-content">
                        <p>
                            <?php 
                            $status=$value['status'];
                            if($status=="PENDING"){
                                ?>
                            <span class="uk-badge uk-badge-warning">
                                <?php echo $value['status']; ?>
                            </span>
                                <?php
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </td>
            <td>

                <?php 
                $status=$value['status'];
                if($status!=""){
                    ?>
                <a href="view_referral?key=<?php echo $value['referral_id'] ?>&title=<?php echo $value['patient_fname'] ?>" class="uk-button uk-button-success" data-uk-tooltip title="Viewing referral">
                    <i class="fa fa-eye"></i>
                </a>
                <a status="<?php echo $status; ?>" action="<?php echo $value['referral_id']; ?>" data-uk-modal="{target:'#modal_overflow'}" class="uk-button uk-button-primary updateStatus" data-uk-tooltip title="Update Referral Status">
                    <i class="fa fa-pencil"></i>
                </a>
                    <div id="modal_overflow" class="uk-modal">
                        <div class="uk-modal-dialog">
                            <button type="button" class="uk-modal-close uk-close"></button>
                            <h2 class="statusId">Update Referral status</h2>
                            <p id="referral_id">Please change the referral status if it has been sent or received</p>
                            <div class="uk-width-1-1" style="margin: 10px;">
                                <span class="uk-form-help-block">Select referral status to update to </span>
                                <select id="status_to_update" class="md-input">
                                    <option value="">Select Status</option>
                                    <?php 
                                    if($status=="PENDING"){
                                        ?>

                                        <option value="SCHEDULED">SCHEDULED</option>
                                        <option value="RECEIVED">RECEIVED</option>
                                        <?php
                                    }elseif($status=="SCHEDULED"){
                                        ?>
                                        <option value="PENDING">PENDING</option>
                                        <option value="RECEIVED">RECEIVED</option>
                                        <?php
                                    }elseif($status=="RECEIVED"){
                                        ?>
                                        <option value="PENDING">PENDING</option>
                                        <option value="SCHEDULED">SCHEDULED</option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <input type="hidden" id="action" name="action" value="<?php echo $value['referral_id']; ?>">
                            </div>
                            <div id="div_schedule" class="uk-width-1-1" style="margin: 10px;display: none;">
                                <div class="uk-input-group">
                                    <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                    <label for="uk_dp_1">Select scheduled  date</label>
                                    <input class="md-input" type="text" id="uk_dp_1" data-uk-datepicker="{format:'DD.MM.YYYY'}">
                                </div>
                            </div>
                            <div class="uk-width-1-1" style="margin:10px;">
                                <button id="btn_update_status" class="md-btn md-btn-success md-btn-wave-light">
                                    UPDATE REFERRAL STATUS
                                </button>
                            </div>
                    </div>
                </div>
                <a style="display: none;" class="uk-button uk-button-danger">
                    COUNTER REFERRAL
                </a>
                    <?php
                }elseif($status=="SENDING"){
                  ?>
                <a class="md-btn" data-uk-tooltip title="Update Referral Status">
                    <i class="fa fa-pencil"></i>
                </a>
                <a class="md-btn disabled">
                    <i class="fa fa-trash-o"></i>
                </a>
                  <?php  
                }
                ?>
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
        no incoming referral available now
    </div>
    <?php
}
?>
	<?php
	}else{
		echo "Please check submitted data";
	}
	}else{
		echo "error";
	}

}else{
	echo "error";
}
?>
<script src="assets/js/actions/ajax_modals.js"></script>
<script src="scripts/referral/incoming.js"></script>   
