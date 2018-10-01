<?php 
require_once 'auth.php';
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Remove Tap Highlight on Windows Phone IE -->
<meta name="msapplication-tap-highlight" content="no"/>

<link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16">
<link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32">

<title>Profile Page <?php echo $_SESSION['names']; ?></title>


<!-- uikit -->
<link rel="stylesheet" href="bower_components/uikit/css/uikit.almost-flat.min.css" media="all">

<!-- flag icons -->
<link rel="stylesheet" href="assets/icons/flags/flags.min.css" media="all">    
<!-- altair admin -->
<link rel="stylesheet" href="assets/css/main.min.css" media="all">

<!-- themes -->
<link rel="stylesheet" href="assets/css/themes/themes_combined.min.css" media="all">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="disable_transitions sidebar_main_open sidebar_main_swipe">
    <!-- main header -->
    <?php include 'navigations.php'; ?>
    <!-- main header end -->
    <!-- main sidebar -->
    <?php include 'sidebar_menu.php'; ?>
    <!-- main sidebar end -->

<div id="page_content">
<div id="page_content_inner">
<div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
    <div class="uk-width-large-10-10">
        <div class="md-card">
            <div class="user_heading">
                <div class="user_heading_menu hidden-print">
                    <div class="uk-display-inline-block" data-uk-dropdown="{pos:'left-top'}">
                    </div>
                    <div class="uk-display-inline-block"><i class="md-icon md-icon-light material-icons" id="page_print">&#xE8ad;</i></div>
                </div>

                    <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                            <?php 
                            require_once 'includes/database.inc.php';
                            include_once 'controllers/Doctor.php';
                            if($_SESSION['user_type']=="doctor"){
                                $profile_image=$doctor->getProfile($_SESSION['user_id']);
                                ?>
                            <img id="profile" src="<?php echo $profile_image ?>" alt="user avatar"/>s
                                <?php
                            }
                            ?>
                            <img id="profile" src="assets/img/avatars/user.png" alt="user avatar"/>
                            <div id="user_id" style="display: block;"><?php echo $_SESSION['user_id']; ?></div>
                            <div id="user_type" style="display: none;">
                                <?php echo $_SESSION['user_type']; ?>
                            </div>
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <div class="user_avatar_controls">
                            <span class="btn-file">
                                <span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
                                <span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
                                <input type="file" name="file" id="file">
                            </span>
                            <a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput"><i class="material-icons">&#xE5CD;</i></a>
                        </div>
                    </div>

                <div class="user_heading_content">
                    <h2 class="heading_b uk-margin-bottom">
                        <span class="uk-text-truncate"><?php echo $_SESSION['names']; ?></span>
                        <span class="sub-heading"><?php echo $_SESSION['user_type']; ?></span>
                    </h2>
                </div>
                <a style="display: none;" class="md-fab md-fab-small md-fab-accent hidden-print">
                    <i class="material-icons">&#xE150;</i>
                </a>
            </div>
            <div class="user_content">
                <ul id="user_profile_tabs" class="uk-tab" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" data-uk-sticky="{ top: 48, media: 960 }">
                    <li class="uk-active"><a href="#">About</a></li>
                    <li><a href="#">Edit Profile</a></li>
                </ul>
                <ul id="user_profile_tabs_content" class="uk-switcher uk-margin">
                    <li>
                     <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin>
                            <div class="uk-width-large-1-1">
                                <h4 class="heading_c uk-margin-small-bottom">Contact Info</h4>
                                <ul class="md-list md-list-addon">
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon material-icons">&#xE158;</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span class="md-list-heading">
                                                <a href="#" class="__cf_email__" data-cfemail="c4bca7b6ababafb784bda5acababeaa7aba9">
                                            sam@gmail.com
                                        </a>
                                        </span>
                                            <span class="uk-text-small uk-text-muted">Email</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span class="md-list-heading">
                                                34567890
                                            </span>
                                            <span class="uk-text-small uk-text-muted">Phone</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon uk-icon-facebook-official"></i>
                                        </div>
                                        <div class="md-list-content">
                                            <span class="md-list-heading">no facebook</span>
                                            <span class="uk-text-small uk-text-muted">Facebook</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon uk-icon-twitter"></i>
                                        </div>
                                        <div class="md-list-content">
                                            <span class="md-list-heading">no tweeter</span>
                                            <span class="uk-text-small uk-text-muted">Twitter</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="md-card">
                            <div class="md-card-content">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <div class="uk-form-row">
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-1">
                                                    <label>Login Email</label>
                                                    <input id="user_names" value="" name="user_names" type="text" class="md-input" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-form-row">
                                            <label>Password</label>
                                            <input id="user_password" name="user_password" type="password" class="md-input"  />
                                        </div>
                                        <div class="uk-form-row">
                                            <label>Confirm Password</label>
                                            <input id="confirm_password" name="confirm_password" type="password" class="md-input"  />
                                        </div>
                                        <div class="uk-form-row">
                                            <button id="btn_update" class="md-btn md-btn-primary md-btn-wave-light">SAVE INFORMATIONS</button>
                                        </div>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <div class="uk-form-row">
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-1">
                                                    <label>About Information</label>
                                                    <textarea cols="30" rows="4" class="md-input">Ut fuga atque nesciunt iusto enim at modi temporibus iste rerum vitae vero eos facilis pariatur occaecati cum soluta dicta veniam rerum eveniet ut nisi.</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-form-row">
                                            <button id="btn_update" class="md-btn md-btn-primary md-btn-wave-light">SAVE INFORMATIONS</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php //include 'views/notifications.php'; ?>
</div>
</div>
</div>

<!-- common functions -->
<script src="assets/js/common.min.js"></script>
<script src="assets/js/profiles/index.js"></script>
<!-- uikit functions -->
<script src="assets/js/uikit_custom.min.js"></script>
<!-- altair common functions/helpers -->
<script src="assets/js/altair_admin_common.min.js"></script>
</body>
</html>