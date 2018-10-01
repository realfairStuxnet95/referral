<div class="row">
<div class="col-lg-12">
<div class="uk-width-1-1">
<button class="uk-button uk-button-primary uk-button-large" data-uk-modal="{target:'#modal_overflow'}">ADD NEW RECEPTIONIST</button>
<button class="uk-button uk-button-danger uk-button-large">EXPORT PDF</button>
<div id="modal_overflow" class="uk-modal">
<div class="uk-modal-dialog">
<button type="button" class="uk-modal-close uk-close"></button>
<h2 class="heading_a">Fill form to register new Receptionist</h2>
<form id="frm_reg_rec">
<div class="md-card">
<div class="md-card-content">
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-1-1">
        <div class="uk-form-row">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-2">
                    <label>Receptionist names</label>
                    <input id="rec_names" name="rec_names" type="text" class="md-input" maxlength="106" required="" />
                </div>
                <div class="uk-width-medium-1-2">
                    <label>Receptionist email</label>
                    <input id="rec_email" name="rec_email" type="email" class="md-input" maxlength="106" required="" />
                </div>
            </div>
        </div>
        <div class="uk-form-row">
            <label>Password</label>
            <input id="rec_password" name="rec_password" type="password" class="md-input" maxlength="16" required="" />
        </div>
        <div class="uk-form-row">
            <label>Phone number</label>
            <input id="rec_phone" name="rec_phone" type="number" class="md-input" maxlength="16" required="" />
        </div>
        <div class="uk-form-row">
            <label>Address</label>
            <input id="rec_address" name="rec_address" type="text" class="md-input" maxlength="56" required="" />
        </div>
        <div class="uk-form-row">
                    <input type="hidden" id="hos_id" name="hos_id" value="<?php echo $_SESSION['user_id'];?>">
        <CENTER>
                <input type="submit" class="uk-button uk-button-primary uk-button-large" value="SAVE RECEPTIONIST INFO" />
        </CENTER>
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