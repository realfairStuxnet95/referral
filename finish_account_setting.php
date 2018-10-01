<?php
include 'session/Session.php';
    session_start();
    $state=$session->finish_account_to_login();
    if($state){
        header("Location:access");
    }else{

    }
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

    <title>Finish Account Set up.</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>

    <!-- uikit -->
    <link rel="stylesheet" href="bower_components/uikit/css/uikit.almost-flat.min.css"/>

    <!-- altair admin login page -->
    <link rel="stylesheet" href="assets/css/login_page.min.css" />

</head>
<body class="login_page">

    <div class="login_page_wrapper">
        <div class="md-card" id="login_card">
            <div class="md-card-content large-padding" id="login_form">
                <form id="frm_finish">
                    <center><h3>Finish your account 
                        <font style="color:#009966;"><?php echo $_SESSION['director_id'];?>
                        </font> 
                        </h3></center>
            <div style="margin-bottom: 20px;box-shadow: 0px 0px;" class="md-card">
                <div style="" class="md-card-content"> 
                    <h4 class="heading_a">
                        Select Profile Image if available
                    </h4>
                    <img id="profile" src="assets/img/bg.jpg" style="height: 120px;">
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <div style="margin:10px;" class="uk-form-file md-btn md-btn-primary">
                                Select image
                                <input id="file" type="file" name="file" required="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h3>Please fill the following data.</h3>
                    <div class="uk-form-row">
                        <label for="login_username">Email</label>
                        <input class="md-input" type="email" id="user_mail" name="user_mail" required="" />
                    </div>
                    <div class="uk-form-row">
                        <label for="login_password">Telephone in format(+2507XXXXXX)</label>
                        <input class="md-input" type="number" id="user_phone" minlength="13" maxlength="20" name="user_phone" />
                    </div>
                    <div class="uk-margin-medium-top">
                        <input type="hidden" name="user_data" id="user_data" value="<?php echo $_SESSION['director_id']; ?>">
                        <button id="btnFinish" type="submit" name="finish" class="md-btn md-btn-success md-btn-block md-btn-large">FINISH ACCOUNT</button>
                    </div>
                </form>
                <center id="loader" style="margin-top: 5px;display: none;"><p>Please wait......<br>
                    <img src="assets/img/loader/loader.gif" style="height: 90px;">
                </p></center>
            </div>
        </div>
        <div class="uk-margin-top uk-text-center">
            <a href="#" id="signup_form_show">&copy; 2018</a>
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
    <script src="assets/js/finish/finish.js"></script>
</body>
</html>