<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="uk-overflow-container">
            <?php
            if(isset($_GET['success'])){
            	include 'load/referral_saved.php';
            }
            include 'add/add_referral.php';
            include 'load/load_referrals.php';
            ?>
        </div>
    </div>
</div>
<script src="assets/js/jquery.js"></script>
<script src="assets/actions/ajax_modals.js"></script>
<script src="referral/js/referral.js"></script>