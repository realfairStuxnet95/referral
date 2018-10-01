<?php
require 'module_loader.php';
$hos_id=$user->get_user_hospital_id($_SESSION['user_id']);
//check if hospital has been activated
$activate_status=$admin->check_if_hospital_is_activated($hos_id);
if($activate_status){
    ?>
<div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>
    <a href="dashboard?action=doctors" style="cursor: pointer;">
        <div>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-float-right uk-margin-top uk-margin-small-right">
                        <i style="font-size: 44px;" class="fa fa-user-md" aria-hidden="true"></i>
                    </div>
                    <span class="uk-text-muted uk-text-small">Doctors</span>
                    <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $admin->hospital_admin_rows("doctors",$hos_id); ?></noscript></span></h2>
                </div>
            </div>
        </div>
    </a>
    <a href="dashboard?action=nurses" style="cursor: pointer;">
        <div>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-float-right uk-margin-top uk-margin-small-right">
                        <i style="font-size: 44px;" class="fa fa-user"></i>
                    </div>
                    <span class="uk-text-muted uk-text-small">Nurses</span>
                    <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $admin->hospital_admin_rows("nurses",$hos_id); ?></noscript></span></h2>
                </div>
            </div>
        </div>
    </a>
    <a href="dashboard?action=receptionists" style="cursor: pointer;">
        <div>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-float-right uk-margin-top uk-margin-small-right">
                        <i style="font-size: 44px;" class="fa fa-users"></i>
                    </div>
                    <span class="uk-text-muted uk-text-small">Receptionists</span>
                    <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $admin->hospital_admin_rows("receptionists",$hos_id); ?></noscript></span></h2>
                </div>
            </div>
        </div>
    </a>
    <a href="dashboard" style="cursor: pointer;">
        <div>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-float-right uk-margin-top uk-margin-small-right">
                        <i style="font-size: 44px;" class="fa fa-file-text"></i>
                    </div>
                    <span class="uk-text-muted uk-text-small">Referrals</span>
                    <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $admin->hospital_admin_rows("referrals",$hos_id); ?></noscript></span></h2>
                </div>
            </div>
        </div>
    </a>
    <a href="dashboard" style="cursor: pointer;">
        <div>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-float-right uk-margin-top uk-margin-small-right">
                        <i style="font-size: 44px;" class="fa fa-file-text-o"></i>
                    </div>
                    <span class="uk-text-muted uk-text-small">Counter Referrals</span>
                    <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $admin->hospital_admin_rows("counter_referrals",$hos_id); ?></noscript></span></h2>
                </div>
            </div>
        </div>
    </a>
</div>
    <?php
}else{
    ?>
<div class="uk-alert uk-alert-danger uk-alert-large" data-uk-alert="">
<h4 class="heading_b">System Warning</h4>
 Please wait to get activate or contact your system administrator in order to start working.
</div>
    <?php
}
?>

<script src="assets/js/jquery.js"></script>
<script src="assets/js/actions/ajax_modals.js"></script>
<script src="assets/js/hospital/alert.js"></script>