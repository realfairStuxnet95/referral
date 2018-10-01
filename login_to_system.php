<div id="login_card">
    <div id="login_form">
        <div class="login_heading">
            <div class="user_avatar"></div>
        </div>
        <form id="frm_login">
        	<center><h2>Login to System</h2></center>
            <div class="uk-form-row">
                <label for="login_username">Username</label>
                <input class="md-input" type="text" id="login_username" name="login_username" required="" />
            </div>
            <div class="uk-form-row">
                <label for="login_password">Password</label>
                <input class="md-input" type="password" id="login_password" name="login_password" required="" />
            </div>
            <div class="uk-margin-medium-top">
                <button id="btn_login" type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large">Sign In</button>
            </div>
            <div class="uk-margin-top">
                <a href="#" id="login_help_show" class="uk-float-right">Need help?</a>
                <span class="icheck-inline">
                    <input type="checkbox" name="login_page_stay_signed" id="login_page_stay_signed" data-md-icheck />
                    <label for="login_page_stay_signed" class="inline-label">Stay signed in</label>
                </span>
            </div>
        </form>
    </div>
    <?php include 'login_help_catalog.php'; ?>
    <?php include 'login_password_reset.php'; ?>
    <?php include 'register_hospital.php'; ?>
</div>
<script src="assets/js/access/accessing.js"></script>