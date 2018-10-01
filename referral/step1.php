<div class="md-card">
    <div id="card_patient" class="md-card-content">
        <h2 class="heading_a">Provide Patient informations</h2>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <div class="uk-form-row">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-2">
                            <label>Patient FirstName</label>
                            <input id="fname" name="fname" type="text" class="md-input" required="" />
                        </div>
                        <div class="uk-width-medium-1-2">
                            <label>Patient LastName</label>
                            <input id="lname" name="lname" type="text" class="md-input" required="" />
                        </div>
                        <div class="uk-width-medium-1-2">
                            <label>Patient ID No</label>
                            <input id="id_no" name="id_no" type="number" maxlength="16" class="md-input" required="" />
                        </div>
                        <div class="uk-width-medium-1-2">
                            <label>Patient Gender</label>
                            <select id="gender" name="gender" class="md-input" required>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                        <div class="uk-width-medium-1-2">
                            <label>Patient Date of Birth</label>
                        <input type="text" name="dob" id="dob" required class="md-input" data-parsley-date data-parsley-date-message="This value should be a valid date" data-uk-datepicker="{format:'MM/DD/YYYY'}" />
                        </div>
                        <div class="uk-width-medium-1-2">
                            <label>Patient Phone</label>
                            <input id="phone" name="phone" type="number" class="md-input"  required>
                        </div>

                        <div class="uk-width-medium-1-1">
                            <button id="btn_step1" class="md-btn">SAVE AND CONTINUES</button>
                        </div>
                        <p style="padding: 10px;margin:10px;color: #fff;background: #dd4422;display: none;"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>
<script src="assets/js/common.min.js"></script>
<script src="assets/js/doctor/step1.js"></script>