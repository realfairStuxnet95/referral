<div class="row">
<div class="col-lg-12">
 <div class="uk-width-1-1">
<button class="uk-button uk-button-primary uk-button-large" data-uk-modal="{target:'#modal_overflow'}">ADD NEW NURSE</button>
<button class="uk-button uk-button-danger uk-button-large">EXPORT PDF</button>
<div id="modal_overflow" class="uk-modal">
<div class="uk-modal-dialog">
    <button type="button" class="uk-modal-close uk-close"></button>
    <h2 class="heading_a">Fill form to register new Nurse</h2>
<form id="frm_reg_nurse">
<div class="md-card">
<div class="md-card-content">
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-1-1">
        <div class="uk-form-row">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-2">
                    <label>Nurse names</label>
                    <input id="nurse_names" name="nurse_names" type="text" class="md-input" maxlength="106" required="" />
                </div>
                <div class="uk-width-medium-1-2">
                    <label>Nurse email</label>
                    <input id="nurse_email" name="nurse_email" type="email" class="md-input" maxlength="106" required="" />
                </div>
            </div>
        </div>
        <div class="uk-form-row">
            <label>Password</label>
            <input id="nurse_password" name="nurse_password" type="password" class="md-input" maxlength="16" required="" />
        </div>
        <div class="uk-form-row">
            <label>Phone number</label>
            <input id="nurse_phone" name="nurse_phone" type="number" class="md-input" maxlength="16" required="" />
        </div>
        <div class="uk-form-row">
            <label>Address</label>
            <input id="nurse_address" name="nurse_address" type="text" class="md-input" maxlength="56" required="" />
        </div>
        <div class="uk-form-row">
                    <input type="hidden" id="hos_id" name="hos_id" value="<?php echo $_SESSION['user_id'];?>">
            <CENTER><input type="submit" class="uk-button uk-button-primary uk-button-large" value="SAVE NURSE INFO" /></CENTER>
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