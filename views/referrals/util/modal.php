<?php
$receive_hospital=$value['to_hospital_id'];
$deparments=$admin->load_department($receive_hospital);
?>
<div id="modal_overflow" class="uk-modal">
    <div class="uk-modal-dialog">
        <button type="button" class="uk-modal-close uk-close">
            
        </button>
        <h2 class="statusId">Update Referral status</h2>
        <p id="referral_id">Please change the referral status if it has been sent or received</p>
        <div class="uk-width-1-1" style="margin: 10px;">
            <span class="uk-form-help-block">Select referral status to update to </span>
            <input type="hidden" id="to_hospital" value="<?php echo $receive_hospital; ?>">
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
                <label for="uk_dp_1">Select scheduled  date</label>
                <input class="md-input" type="text" id="uk_dp_1" data-uk-datepicker="{format:'DD/MM/YYYY'}">
        </div>
        <div id="div_time" class="uk-width-1-1" style="display: none;">
            <span class="uk-form-help-block">
                Select Time for schedule
            </span>
            <input type="time" id="usr_time" class="md-input">
        </div>
        <div id="div_dept" class="uk-width-1-1" style="margin: 10px;display: none;">
            <span class="uk-form-help-block">Select Department to assign To: </span>
            <select id="department_to_receive" class="md-input">
                <option value="">Select Department</option>
                <?php 
                foreach ($deparments as $key => $dept) {
                    ?>
                    <option value="<?php echo $dept['department_id']; ?>">
                        <?php 
                            echo $admin->get_department_name($dept['name']); 
                        ?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div id="div_doctor" class="uk-width-1-1" style="margin: 10px;display: none;">
            <span class="uk-form-help-block">Select Doctor to assign To: </span>
            <select id="doctor_to_receive" class="md-input">
                <option value="">Select Doctor</option>
            </select>
        </div>
        <div class="uk-width-1-1" style="margin:10px;">
            <button id="btn_update_status" class="md-btn md-btn-success md-btn-wave-light">
                UPDATE REFERRAL STATUS
            </button>
        </div>
    </div>
</div>