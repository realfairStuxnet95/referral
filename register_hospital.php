<div id="register_form" style="display: none">
    <button type="button" class="uk-position-top-right uk-close uk-margin-right back_to_login"></button>
    <h2 class="heading_a uk-margin-medium-bottom">Register a hospital?</h2>
    <form id="frm_register">
        <div class="uk-form-row">
            <label for="register_username">Hospital Name</label>
            <input class="md-input" type="text" id="hospital_name" name="hospital_name" required="" />
        </div>
        <div class="uk-form-row">
            <label for="hospital_region">Region/District</label>
           <select class="md-input" id="hospital_region" name="hospital_region" required="">
           	<?php 
            $info=array();
            $info=$location->get_locations();
            foreach ($info as $key => $value) {
                ?>
                <option value="<?php echo $value['id']; ?>"><?php echo $value['region_title']; ?></option>
                <?php
            }
            ?>
           </select>
        </div>
        <div class="uk-form-row">
            <label for="hospital_region">Institution Category</label>
           <select class="md-input" id="hospital_category" name="hospital_category" required="">
            <?php 
            $informations=array();
            $informations=$information->get_hospital_categories();
            foreach ($informations as $key => $value) {
                ?>
                <option value="<?php echo $value['id']; ?>"><?php echo $value['category_name']; ?></option>
                <?php
            }
            ?>
           </select>
        </div>

        <div class="uk-form-row">
            <label for="director_names">Director Names</label>
            <input class="md-input" type="text" id="director_names" name="director_names" required="" />
        </div>
        <div class="uk-form-row">
            <label for="phone">Hospital Official Phone</label>
            <input class="md-input" type="number" id="phone" min="10" name="phone" maxlength="14" required="" />
        </div>
        <div class="uk-form-row">
            <label for="email">Hospital Official Email.</label>
            <input class="md-input" type="email" id="email" name="email" required="" />
        </div>

        <div class="uk-form-row">
            <label for="director_password">Create Password</label>
            <input class="md-input" type="password" id="director_password" name="director_password" required="" min="6" />
        </div>
        <div class="uk-form-row">
            <label for="confirm_password">Confirm Password</label>
            <input class="md-input" type="password" id="confirm_password" name="confirm_password" required="" min="6" />
        </div>

        <div class="uk-margin-medium-top">
            <input type="hidden" name="errors" id="errors">
            <button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large">Register & Continues</a>
        </div>
    </form>
    <p style="display: none;">
        <center><img src="assets/img/loader/loader.gif" style="width:100px;display: none;"></center>
    </p>
    <p id="reg_errors" style="padding: 10px;background-color: #dd4422;color: #fff;border-radius: 10px;display: none;">
        
    </p>
</div>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/register/register.js"></script>
<script src="assets/js/register/check.js"></script>