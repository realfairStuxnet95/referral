 <div class="row">
    <div class="col-lg-12">
     <div class="uk-width-1-1">
    <button class="uk-button uk-button-primary uk-button-large" data-uk-modal="{target:'#modal_overflow'}">ADD NEW DOCTOR</button>
    <button class="uk-button uk-button-danger uk-button-large">EXPORT PDF</button>
    <div id="modal_overflow" class="uk-modal">
        <div class="uk-modal-dialog">
            <button type="button" class="uk-modal-close uk-close"></button>
            <h2 class="heading_a">Fill form to register new doctor</h2>
<form id="frm_reg_doctor">
<div class="md-card">
<div class="md-card-content">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-1">
                    <div class="uk-form-row">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">
                                <label>Doctor names</label>
                                <input id="doctor_names" name="doctor_names" type="text" class="md-input" maxlength="106" required="" />
                            </div>
                            <div class="uk-width-medium-1-2">
                                <label>Doctor email</label>
                                <input id="doctor_email" name="doctor_email" type="email" class="md-input" maxlength="106" required="" />
                            </div>
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label>Password</label>
                        <input id="doctor_password" name="doctor_password" type="password" class="md-input" maxlength="16" required="" />
                    </div>
                    <div class="uk-form-row">
                        <label>Phone number</label>
                        <input id="doctor_phone" name="doctor_phone" type="number" class="md-input" maxlength="16" required="" />
                    </div>
                    <div class="uk-form-row">
                        <label>Address</label>
                        <input id="doctor_address" name="doctor_address" type="text" class="md-input" maxlength="56" required="" />
                    </div>
                    <div class="uk-form-row">
                        <label>Department</label>
                        <select id="doctor_department" name="doctor_department" class="md-input">
                    <?php 
                     //get hospital id from user sessions
                    require_once 'includes/database.inc.php';
                    include_once 'controllers/HospitalAdmin.php';
                    include_once 'controllers/User.inc.php';

                    //get the hospital id from hospital admin
                    $hos_id=$user->get_user_hospital_id($_SESSION['user_id']);
                    //gett department of a hospital
                    $result=array();
                    $result=$admin->load_department($hos_id);
                    ?>
                    <?php 
                    foreach ($result as $key => $value) {
                      ?>
                      <option value="<?php echo $value['name']; ?>">
                        <?php 
                        echo $admin->get_department_name($value['name']);
                        ?>
                      </option>
                      <?php
                    }
                    ?>
                    
                        </select>
                    </div>
                    <div class="uk-form-row">
                        <label>Select image</label>
    <div style="margin-bottom: 20px;box-shadow: 0px 0px;" class="md-card">
        <div style="" class="md-card-content"> 
            <h4 class="heading_a">
                Select Profile Image if available
            </h4>
            <img id="profile" src="assets/img/bg.jpg" style="height: 120px;display: none;">
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <div style="margin:10px;" class="uk-form-file md-btn md-btn-primary">
                        Select image
                        <input id="file" type="file" name="file" required="">
                    </div>
                </div>
            </div>
        </div>
    </div>
                    </div>

                    <div class="uk-form-row">
                                <input type="hidden" id="hos_id" name="hos_id" value="<?php echo $_SESSION['user_id'];?>">
                        <CENTER><input type="submit" class="uk-button uk-button-primary uk-button-large" value="SAVE MEMBER INFO" /></CENTER>
                        <p>
                        	<center><img id="loading" src="assets/img/loading.gif" style="width: 100px;height:auto;display: none;"></center>
                        </p>
                        <p id="errors" style="background: #dd4422;color: #fff;border-radius: 10px;padding: 10px;display: none;">test error</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
                        </div>
                    </div>
                </div>
                                </div>
                            </div>