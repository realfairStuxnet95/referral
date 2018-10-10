            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_a">
                        Form file
                        <span id="selected" class="sub-heading">Upload various documents related to your Referral.(<font style="color:orange;">Document will be Uploaded After you select them.</font>)</span>
                    </h3>
                    <form id="uploadForm" method="POST">
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <div class="uk-form-file md-btn md-btn-primary">
                                Select Attachments  
                                      <input id="form-file" type="file" name="files[]" multiple />  
                                <input type="hidden" id="referral" name="referral"> 
                            </div>
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <center>
                                <button id="btn_upload" class="md-btn md-btn-success">FINISH TRANSFER REQUEST</button>
                                <a href='dashboard?action=outgoing_referrals&success' class="md-btn md-btn-default">SKIP ATTACHMENTS</a>
                            </center>
                        </div>
                    </div> 
                    </form>

                </div>
            </div>
<script src="assets/js/common.min.js"></script>
<script src="assets/js/doctor/step4.js"></script>