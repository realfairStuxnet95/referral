<?php 
require_once 'auth.php';
?>
<!doctype html>
<html lang="en"> 
<head>
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>Referral form Transfer</title>
    <!-- weather icons -->
    <link rel="stylesheet" href="bower_components/weather-icons/css/weather-icons.min.css" media="all">
    <!-- metrics graphics (charts) -->
    <link rel="stylesheet" href="bower_components/metrics-graphics/dist/metricsgraphics.css">
    <!-- chartist -->
    <link rel="stylesheet" href="bower_components/chartist/dist/chartist.min.css">

<!-- uikit -->
<link rel="stylesheet" href="bower_components/uikit/css/uikit.almost-flat.min.css" media="all">

<!-- flag icons -->
<link rel="stylesheet" href="assets/icons/flags/flags.min.css" media="all">

<!-- style switcher -->
<link rel="stylesheet" href="assets/css/style_switcher.min.css" media="all">

<!-- altair admin -->
<link rel="stylesheet" href="assets/css/main.min.css" media="all">

<!-- themes -->
<link rel="stylesheet" href="assets/css/themes/themes_combined.min.css" media="all">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- select2 -->
<link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
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
        <div class="uk-grid" >
            <div class="uk-width-medium-1-1">
                <h4 class="heading_a uk-margin-bottom">
                Referral transfer form</h4>
                <div class="md-card">
                    <?php include 'referral/title.php'; ?>
                    <div class="md-card-content">
                        <div id="steps" step="2" accesskey="0"></div>
                        <div id="card_loader">

                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
<script src="assets/js/common.min.js"></script>
<!-- uikit functions -->
<script src="assets/js/uikit_custom.min.js"></script>
<!-- altair common functions/helpers -->
<script src="assets/js/altair_admin_common.min.js"></script>
    <!-- select2 -->
<script src="bower_components/select2/dist/js/select2.min.js"></script>
    <!-- htmleditor (codeMirror) -->
<script src="assets/js/uikit_htmleditor_custom.min.js"></script>
<script src="assets/js/doctor/ref.js"></script>
<style type="text/css">
    #icon1,#icon2,#icon3{
        display: none;
    }
</style>
</body>
</html>