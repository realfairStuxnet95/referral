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
	}elseif($action=="get_referrals"){
        $option=(int)$function->sanitize($data[1]);
        if($option==2){
            $status=$function->sanitize($data[2]);
            displayReferrals($referral,$function,$super,$option,$status,0,"");
        }elseif($option==3){
            $hospital_id=$function->sanitize($data[2]);
            displayReferrals($referral,$function,$super,$option,0,$hospital_id,"");
        }
        else{
           displayReferrals($referral,$function,$super,1,0,0,""); 
        }
        
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
            <button id="btn_hopitals_export" class="uk-button uk-button-danger uk-button-large">EXPORT PDF</button>
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
function displayReferrals($referral,$function,$super,$option,$status,$hospital_id,$sent_date){
    $referrals=$referral->get_system_referrals($option,$status,$hospital_id,$sent_date);
    ?>
    <div class="md-card">
        <div class="md-card-content">
            <div style="margin: 0px;" class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-3">
                        <?php 
                        $departments=$super->get_hospitals('*',0);
                        ?>
                        <select id="select_ref_hos" class="md-input" data-uk-tooltip="{pos:'left'}" title="Filter with department">
                            <option value="" disabled selected hidden>Filter Hospital</option>
                            <?php 
                            foreach ($departments as $key => $dpt) {
                                ?>
                                <option value="<?php echo $dpt['hospital_id']; ?>">
                                    <?php echo $dpt['hospital_name']; ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="uk-width-medium-1-3">
                        <select id="select_ref_status" class="md-input" data-uk-tooltip="{pos:'left'}" title="Filter with department">
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
    <?php
    if(count($referrals)>0){
    ?>
    <div class="md-card uk-margin-medium-bottom">
        <table class="uk-table uk-text-nowrap" style="overflow-x: scroll;">
            <thead style="background: #F5F5F5;">
            <tr>
                <th>Actions</th>
                <th>Date</th>
                <th>Patient Info</th>
                <th>Referring Provider</th>
                <th>Receiving Hospital</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            foreach ($referrals as $key => $value) {
                ?>
                <tr>
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
                    <td>
                        <a href="view_referral?key=<?php echo $value['referral_id'] ?>&title=<?php echo $value['patient_fname'] ?>">
                        <?php echo $function->formatDate($value['regDate']); ?>
                        </a>
                    </td>
                    <td>
                        <a href="view_referral?key=<?php echo $value['referral_id'] ?>&title=<?php echo $value['patient_fname'] ?>" style="color:#333;">
                            <font style="font-weight: bold;">Names:</font> 
                                 <font style="color: #0077cc;">
                                    <?php echo $value['patient_fname'].' '.$value['patient_lname']; ?>
                                </font>
                                <br>
                            <?php 
                            if($value['patient_phone']!=''){
                                ?>
                                <span class="uk-badge uk-badge-primary">
                                    <?php 
                                    echo 'Phone: '.$value['patient_phone'];
                                    ?>
                                </span>
                                <?php
                            }else{
                                ?>
                                <span class="uk-badge uk-badge-primary">
                                    <?php 
                                    echo 'Guardian: '.$value['guardian'].' / Tel :'.$value['guardian_phone'];
                                    ?>
                                </span>
                                <?php
                            }
                            ?>
                        </a>
                    </td>
                    <td>
                        <a href="view_referral?key=<?php echo $value['referral_id'] ?>&title=<?php echo $value['patient_fname'] ?>">
                            <font style="color: #333;">
                                <?php
                                 echo 'From: <b>'.$value['from_hospital_name'].'</b>'; 
                                ?>
                            </font>
                            <span class="uk-badge uk-badge-success">
                                <?php echo 'Physician:'.$value['physician_name'].'<br>Tel:'.$value['physician_phone']; ?>
                            </span>
                        </a>
                    </td>
                    <td>
                        <a href="view_referral?key=<?php echo $value['referral_id'] ?>&title=<?php echo $value['patient_fname'] ?>">
                            <font style="color: #333;">
                                <?php
                                 echo 'To: <b>'.$value['to_hospital_name'].'</b>'; 
                                ?>
                            </font>
                            <br>
                            <span class="uk-badge uk-badge-success">
                                <?php echo 'Receive Dptment:'.$value['receive_department'];?>
                            </span>
                        </a>
                    </td>
                    <td>
                        <a href="view_referral?key=<?php echo $value['referral_id'] ?>&title=<?php echo $value['patient_fname'] ?>">
                            <?php 
                            $status=$value['status'];
                            if($status=="PENDING"){
                                ?>
                            <span class="uk-badge uk-badge-warning">
                                <?php echo $value['status']; ?>
                            </span>
                                <?php
                            }elseif($status=="RECEIVED"){
                                ?>
                                <span class="uk-badge uk-badge-success">
                                    <?php echo $value['status']; ?>
                                </span>
                                <?php
                            }elseif($status=="SCHEDULED"){
                                ?>
                                <span class="uk-badge uk-badge-info">
                                    <?php echo $value['status']; ?>
                                </span>
                                <?php
                            }
                            ?>
                        </a>
                    </td>
                </tr> 
                
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <?php
    }else{
        ?>
        <div class="uk-alert uk-alert-danger" data-uk-alert>
            <a href="#" class="uk-alert-close uk-close"></a>
            no incoming referral available now
        </div>
        <?php
    }
}
?>
<script src="assets/js/loader/post_loader.js"></script>
<script src="assets/js/super/hospitals.js"></script>