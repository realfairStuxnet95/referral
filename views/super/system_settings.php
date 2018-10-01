<?php
require_once 'includes/database.inc.php';
include_once 'controllers/System.php';
//check if referral got a counter referral
$system_info=array();
$system_info=$system->get_system();
?>
<div class="md-card">
    <div class="md-card-content">
        <h3 class="heading_a">System Settings</h3>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <div class="uk-form-row">
                    <div class="uk-grid" data-uk-grid-margin>
                        <?php 
                        foreach ($system_info as $key => $value) {
                            ?>
                        <div class="uk-width-medium-1-2">
                            <label>System name</label>
                            <input id="name" type="text" value="<?php echo $value['name']; ?>" class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-medium-1-2">
                            <label>System title</label>
                            <input id="title" type="text" value="<?php echo $value['title']; ?>" class="md-input label-fixed" />
                        </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <?php 
                foreach ($system_info as $key => $value) {
                    ?>
                <div class="uk-form-row">
                    <label>Address</label>
                    <input id="address" type="text" value="<?php echo $value['address']; ?>" class="md-input"  />
                </div>
                <div class="uk-form-row">
                    <label>Phone Number</label>
                    <input id="phone" type="number" value="<?php echo $value['phone']; ?>" class="md-input"/>
                </div>
                    <?php
                }
                ?>
            </div>
            <div class="uk-width-medium-1-2">
                <?php 
                foreach ($system_info as $key => $value) {
                    ?>
                <div class="uk-form-row">
                    <label>System email</label>
                    <input id="email" type="email" class="md-input label-fixed" value="<?php echo $value['system_email']; ?>" />
                </div>
                    <?php
                }
                ?>

            </div>
        </div>
        </div>
    </div>
</div>

<div class="md-card">
    <div class="md-card-content">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-2">
                <h3 class="heading_a uk-margin-medium-bottom">
                    System Home Description & Logo
                </h3>
                <div class="uk-form-row">
                    <label>Home Description</label>
                    <?php 
                    foreach ($system_info as $key => $value) {
                        ?>
                        <textarea id="description" cols="30" rows="4" class="md-input"><?php echo $value['description']; ?></textarea>
                            
                        <?php
                    }
                    ?>
                    
                </div>
            </div>
            <div class="uk-width-medium-1-2">
<div class="md-card">
    <div class="md-card-content">
        <h3 class="heading_a">
            Select System logo.
        </h3>
        <div class="uk-grid">
            <div class="uk-width-1-1">
                <div id="file_upload-drop" class="uk-file-upload">
                    <p class="uk-text">Drop file to upload</p>
                    <p class="uk-text-muted uk-text-small uk-margin-small-bottom">or</p>
                    <?php 
                    foreach ($system_info as $key => $value) {
                       if($value['logo']!=""){
                        ?>
                    <img id="system_logo" src="system_images/logo/<?php echo $value['logo']; ?>" style="width: 200px;height: auto;display: block;">
                        <?php
                       }
                    }
                    ?>
                    <a class="uk-form-file md-btn">choose file<input id="file_upload-select" type="file"></a>
                </div>
                <div id="file_upload-progressbar" class="uk-progress uk-hidden">
                    <div class="uk-progress-bar" style="width:0">10%</div>
                </div>
            </div>
        </div>
    </div>
</div>
            </div>
        </div>
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <button id="btn_save_settings" class="md-btn md-btn-primary">
                        SAVE SETTINGS
                    </button>
                </div>
            </div>
    </div>
</div>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/loader/post_loader.js"></script>
<script src="assets/js/super/system.js"></script>
