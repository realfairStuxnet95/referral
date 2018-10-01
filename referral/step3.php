<div id="card_finish">
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-3">
                        <label><h3>Hospital Admission Date</h3></label>
                    <input type="text" name="admission_date" id="admission_date" required class="md-input" data-parsley-date data-parsley-date-message="This value should be a valid date" data-uk-datepicker="{format:'MM/DD/YYYY'}" />
                    </div>
                    <div class="uk-width-medium-1-3">
                        <label><h3>Hospital Length of Stay   (…… ) Days </h3></label>
                    <input type="number" name="stay_length" id="stay_length" class="md-input" />
                    </div>
                    <div class="uk-width-medium-1-3">
                        <label><h3>Transfer date and Time:</h3></label>
                    <input type="text" name="transfer_date" id="transfer_date" required class="md-input" data-parsley-date data-parsley-date-message="This value should be a valid date" data-uk-datepicker="{format:'MM/DD/YYYY'}" />
                    </div>
                    </div>
                </div>
            </div>
            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_a uk-margin-bottom">Reason for Transfer</h3>
                        <textarea id="transfer_reason" name="transfer_reason" cols="30" rows="3" class="md-input"></textarea>
                </div>
            </div>
            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_a uk-margin-bottom">Patient Diagnostic: </h3>
                    <textarea id="patient_diagnostic" name="patient_diagnostic" cols="30" rows="3" class="md-input"></textarea>
                </div>
            </div>
            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_a uk-margin-bottom">History of patient illness: </h3>
                    <textarea id="patient_history" name="patient_history" cols="30" rows="3" class="md-input"></textarea>
                </div>
            </div>
            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_a uk-margin-bottom">Past Medical / Surgical / OBGYN History: </h3>
                    <textarea id="past_medical" name="past_medical" cols="30" rows="3" class="md-input"></textarea>
                </div>
            </div>
            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_a uk-margin-bottom">Summary of Hospital Name Admission (Including procedures, relevant lab or imaging results, etc.)  </h3>
                    <textarea id="summary" name="summary" cols="30" rows="3" class="md-input"></textarea>
                </div>
            </div>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <center>
                                <button id="btn_finish" class="md-btn md-btn-success">FINISH TRANSFER REQUEST</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
</div>
<script src="assets/js/common.min.js"></script>
<script src="assets/js/doctor/step3.js"></script>