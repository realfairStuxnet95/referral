<?php require_once '../auth.php';?>
<div id="card_transfer">
<div class="md-card">
    <div class="md-card-content">
        <h3 class="heading_a">Transfer Summary: (From hospital,to Hospital)</h3>
        <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-2">
            <label>Hospital Name</label>
            <?php 
            require_once '../includes/database.inc.php';
            include '../controllers/Doctor.php';

            $hospital_info=array();
            $hospital_info=$doctor->get_hospital($_SESSION['user_id']);
            foreach ($hospital_info as $key => $value) {
                ?>
            <input id="hospital_name" name="hospital_name" type="text" class="md-input" value="<?php echo $value['hospital_name'] ?>" disabled required="" />
            <input type="hidden" name="from_hospital_id" id="from_hospital_id" value="<?php echo $value['hospital_id'] ?>">
                <?php
            }
            ?>
        </div>
        <div class="uk-width-medium-1-2">
            <label>Attending Physician Name</label>
            <input id="physician_name" name="physician_name" type="text" class="md-input" value="<?php echo $_SESSION['names']; ?>" required="" disabled/>
        </div>
        <div class="uk-width-medium-1-2">
            <label>Physician Phone</label>
            <input id="physician_phone" name="physician_phone" value="<?php echo $doctor->get_doctor_phone($_SESSION['user_id']); ?>" type="text" maxlength="16" class="md-input" disabled />
        </div>
        <div class="uk-width-medium-1-2">
            <label>Mode of transportation</label>
            <select id="transportation" name="transportation" class="md-input" required>
            <?php 
            require_once '../includes/database.inc.php';
            include '../controllers/Transport.inc.php';

            $trans_mode=array();
            $trans_mode=$transport->transport_modes();
            foreach ($trans_mode as $key => $value) {
                ?>
                <option value="<?php echo $value['transport_name'] ?>">
                    <?php echo $value['transport_name']; ?>     
                </option>
                <?php
            }
            ?>
            </select>
        </div>
            <div class="uk-width-medium-1-1" style="margin: 20px;">
<div class="row">
<div class="col-lg-12">
 <div class="uk-width-1-1">
<button class="uk-button uk-button-default uk-button-large" data-uk-modal="{target:'#modal_overflow'}" style="margin:10px;">SELECT TO HOSPITAL
</button>
<div class="uk-grid" data-uk-grid-margin id="div_hospital1">

</div>
<div id="modal_overflow" class="uk-modal">
<div class="uk-modal-dialog">
    <button type="button" class="uk-modal-close uk-close"></button>
    <h2 class="heading_a">Filter  form to get Receiver Hospital</h2>
<div class="md-card">
<div class="md-card-content">
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row" style="">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                    <div class="uk-input-group">
                        <label>Filter Receiver Hospital</label>
                        <input id="to_hos_name" name="to_hos_name" list="hospitals_list" type="text" class="md-input" required="" />
                        <datalist id="hospitals_list">
                            <?php 
                             require_once '../includes/database.inc.php';
                             include_once '../controllers/Hospital.inc.php';
                             $hospitals=array();
                             $hospitals=$hospital->get_hospitals();
                             foreach ($hospitals as $key => $value) {
                                ?>
                                <option value="<?php echo $value['hospital_name'];?>">
                                <?php
                             }
                            ?>
                        </datalist>
                        <span class="uk-input-group-addon">
                            <a id="btn_get_info" class="uk-button uk-button-danger">GET INFO</a>
                        </span>
                    </div>
                    </div>
                    <div class="uk-grid" data-uk-grid-margin id="div_hospital" style="margin: 10px;">

                    </div>
                </div>
            </div>
            <div class="uk-form-row">
                <CENTER>
                    <button id="btn_info" class="uk-button uk-button-primary uk-button-large">
                        SAVE INFO
                    </button>
                </CENTER>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="uk-form-row">
    <button id="btn_save" class="uk-button uk-button-primary uk-button-large">
        SAVE AND CONTINUE
    </button> 
</div>
</div>
</div>
        
</div>
</div>
</div>
<script src="assets/js/common.min.js"></script>
<script src="assets/js/doctor/step2.js"></script>