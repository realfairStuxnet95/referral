<?php 
$info=array();
//get the hospital id from hospital admin
$hospital_id=$user->get_user_hospital_id($_SESSION['user_id']);
$info=$admin->get_hospital_info($hospital_id);
?>
<div class="md-card">
    <div class="md-card-content">
        <h3 class="heading_a">Hospital Settings</h3>
        <div class="uk-grid" data-uk-grid-margin>
        <?php 
        foreach ($info as $key => $value) {
            ?>
            <div class="uk-width-medium-1-1">
                <div class="uk-form-row">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-2">
                            <label>Hospital name</label>
                            <input id="name" type="text" value="<?php echo $value['hospital_name']; ?>" class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-medium-1-2">
                            <label>Hospital Slogan</label>
                            <input id="title" type="text" value="<?php echo $value['slogan']; ?>" class="md-input label-fixed" />
                            <input type="hidden" id="action" value="<?php echo $value['hospital_id']; ?>" name="">
                        </div>
                    </div>
                </div>
                <div class="uk-form-row">
                    <label>Address</label>
                    <input id="address" type="text" value="<?php echo $value['address_location']; ?>" class="md-input"  />
                </div>
                <div class="uk-form-row">
                    <label> Hospital Phone Number</label>
                    <input id="phone" type="number" value="<?php echo $value['phone']; ?>" class="md-input"/>
                </div>
                <div class="uk-form-row">
                    <label>Hospital email</label>
                    <input id="email" type="email" class="md-input label-fixed" value="<?php echo $value['email']; ?>" />
                </div>
                <div class="uk-form-row">
                    <label>Home Description</label>
                    <textarea id="description" cols="30" rows="4" class="md-input"><?php echo $value['description']; ?></textarea>                        
                </div>
                <div class="uk-width-1-1">
                    <button style="margin:10px;" id="btn_save_settings" class="md-btn md-btn-primary">
                        SAVE SETTINGS
                    </button>
                </div>
            </div>
            <?php
        }
        ?>
        </div>
    </div>
</div>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/actions/ajax_modals.js"></script>
<script src="assets/js/hospital/hospital_settings.js"></script>
