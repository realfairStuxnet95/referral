<?php 
require 'includes/database.inc.php';
include 'controllers/System.php';
include 'controllers/Location.php';
include 'controllers/Information.php';
?>

<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->

<!-- Mirrored from altair_html.tzdthemes.com/login_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Feb 2018 11:16:43 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="assets/img/logo/logo.png" sizes="16x16">
    <link rel="icon" type="image/png" href="assets/img/logo/logo.png" sizes="32x32">

    <title>
    	<?php 
    	 
    	 $info=$system->login_title();
    	 foreach ($info as $key => $value) {
    	 	echo $value['login_page'];
    	 }
    	?>
    </title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>

    <!-- uikit -->
    <link rel="stylesheet" href="bower_components/uikit/css/uikit.almost-flat.min.css"/>

    <!-- altair admin login page -->
    <link rel="stylesheet" href="assets/css/login_page.min.css" />

</head>
<body class="login_page login_page_v2">

    <div class="uk-container uk-container-center">
        <div class="md-card">
            <div class="md-card-content padding-reset">
                <div class="uk-grid uk-grid-collapse">
                    <div class="uk-width-large-2-3 uk-hidden-medium uk-hidden-small">
                        <div class="login_page_info uk-height-1-1" style="background-image: url('assets/img/backgrounds/photo.jpg')">
                            <div class="info_content">
                                <h1 class="heading_b">
    	<?php 
    	 
    	 $info=$system->login_title();
    	 foreach ($info as $key => $value) {
    	 	echo $value['name'];
    	 }
    	?>
                                </h1>
    	<?php 
    	 
    	 $info=$system->login_title();
    	 foreach ($info as $key => $value) {
    	 	echo $value['description'];
    	 }
    	?>
                                <p>
                                    <a class="md-btn md-btn-success md-btn-small md-btn-wave" href="system_blog">More info</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-large-1-3 uk-width-medium-2-3 uk-container-center">
                        <div class="login_page_forms">
                            <?php include 'login_to_system.php'; ?>
                            <div class="uk-margin-top uk-text-center">
                                <a href="#" id="signup_form_show">Register a hospital?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- common functions -->
    <script src="assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="assets/js/uikit_custom.min.js"></script>
    <!-- altair core functions -->
    <script src="assets/js/altair_admin_common.min.js"></script>

    <!-- altair login page functions -->
    <script src="assets/js/pages/login.min.js"></script>

    <script>
        // check for theme
        if (typeof(Storage) !== "undefined") {
            var root = document.getElementsByTagName( 'html' )[0],
                theme = localStorage.getItem("altair_theme");
            if(theme == 'app_theme_dark' || root.classList.contains('app_theme_dark')) {
                root.className += ' app_theme_dark';
            }
        }
    </script>
</body>
</html>