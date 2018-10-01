<?php
include 'class_loader.php';
$redirectUrl="";
$referral_id;
if(!isset($_GET['ref']) && !isset($_GET['title'])){
    header("Location: dashboard");
}else{
    $referral_id=$_GET['ref'];
    //check if referral is saved
    $check_referral=$referral->check_referral_id(1);
    if(!$check_referral){
      header("Location: dashboard");  
    }else{
        //check if referral has not counter referral
        $has_counter=$referral->hasCounterReferral($referral_id);
        if($has_counter){
            header("Location: dashboard");
        }
    }
    //get information of current user
    $user_type=$_SESSION['user_type'];
    $user_id=$_SESSION['user_id'];
    $user_information=array();
    $user_information=$user->get_user_information($user_id,$user_type);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32">

    <title>Sending Counter referral For: <?php echo $_GET['title']; ?></title>


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
</head>
<body class="disable_transitions sidebar_main_open sidebar_main_swipe">
    <!-- main header -->
    <?php include_once 'navigations.php'; ?>
    <!-- main header end -->
    <!-- main sidebar -->
    <?php include_once 'sidebar_menu.php'; ?>
    <!-- main sidebar end -->

    <div id="page_content">
        <div id="page_content_inner">
        <form action="" id="frm_counter" method="POST">
            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_a">Patient Identifications And Transfer Summary</h3>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-2">
                            <div class="uk-form-row">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <?php 
                                    //get patient info
                                    $patient_info=array();
                                    $patient_info=$referral->get_referral_info(2,$referral_id);
                                    foreach ($patient_info as $key => $value) {
                                    ?>
                                    <input type="hidden" id="referral" name="referral" value="<?php echo $referral_id; ?>">

                                    <div class="uk-width-medium-1-2">
                                        <label>Patient Name </label>
                                        <input type="text" value="<?php echo $value['patient_fname']; ?>" id="patient_fname" name="patient_fname" class="md-input label-fixed " disabled required/>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label>Patient Surname</label>
                                        <input type="text" id="patient_lname" value="<?php echo $value['patient_lname']; ?>" name="patient_lname" class="md-input label-fixed" disabled required/>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label>Patient ID Number </label>
                                        <input type="number" id="patient_id_no" value="<?php echo $value['patient_id_no']; ?>" name="patient_id_no" class="md-input label-fixed" disabled required/>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label>Patient Phone</label>
                                        <input type="number" id="patient_phone" value="<?php echo $value['patient_phone']; ?>" name="patient_phone" class="md-input label-fixed" disabled required/>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label>Patient Date of Birth</label>
                                        <input class="md-input" type="text" id="patient_dob" value="<?php echo $value['patient_dob']; ?>" name="patient_dob" data-uk-datepicker="{format:'DD.MM.YYYY'}" disabled required>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label>
                                            <?php 
                                            if($value['patient_sex']=="M"){
                                                echo "Male";
                                            }elseif($value['patient_sex']=="F"){
                                                echo "Female";
                                            }
                                            ?>
                                        </label>
                                        <input type="text" id="patient_sex" value="<?php echo $value['patient_sex']; ?>" name="patient_sex" class="md-input label-fixed" disabled required/>
                                    </div>
                                    <?php 
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-2">
                            <div class="uk-form-row">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <?php 
                                    //get from hospital info.
                                    $from_hospital_info=array();
                                    $from_hospital_info=$referral->get_referral_info(3,$referral_id);
                                    foreach ($from_hospital_info as $key => $value) {
                                        ?>
                                    <div class="uk-width-medium-1-2">
                                    <label><strong>To: (Hospital name)</strong></label>
                                    <input id="to_hospital_name" name="to_hospital_name" type="text" class="md-input" value="<?php echo $value['to_hospital_name']; ?>" disabled required/>
                                    <input type="hidden" id="to_hospital" name="to_hospital" value="<?php echo $value['to_hospital_id'] ?>">
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                    <label><strong>Receive Department</strong></label>
                                    <input id="receive_department" name="receive_department" type="text" class="md-input" value="<?php echo $value['receive_department']; ?>" disabled required/>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                    <label><strong>From: (Hospital name)</strong></label>
                                    <input id="from_hospital_name" name="from_hospital_name" type="text" class="md-input" value="<?php echo $value['from_hospital_name']; ?>" disabled required/>
                                    <input type="hidden" id="from_hospital" name="from_hospital" value="<?php echo $value['from_hospital_id'] ?>">
                                    
                                    </div>
                                    <?php 
                                    foreach ($user_information as $key => $info) {
                                       ?>
                                    <div class="uk-width-medium-1-2">
                                    <label><strong>Attending Physician Name</strong></label>
                                    <input id="physician_names" name="physician_names" type="text" class="md-input" value="<?php echo $_SESSION['names']; ?>" disabled required/>
                                    </div> 

                                    <div class="uk-width-medium-1-2">
                                    <label><strong>Physician Phone</strong></label>
                                    <input id="physician_phone" name="physician_phone" type="text" class="md-input" value="<?php echo $info['phone']; ?>" disabled required/>
                                    </div> 
                                       <?php
                                    }
                                    ?>
                                    <div class="uk-width-medium-1-2">
                                    <label><strong>3.   MODE of Transport</strong></label>
                                    <select id="mode_of_transport" name="mode_of_transport" class="md-input" required>
                                        <?php 
                                        $trans_mode=array();
                                        $trans_mode=$transport->transport_modes();
                                        foreach ($trans_mode as $key => $value) {
                                            ?>
                                        <option value="<?php echo $value['transport_name'] ?>">
                                            <?php echo $value['transport_name']; ?>     
                                        </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    </div> 
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <h3 class="heading_a uk-margin-medium-bottom">
                                Hospitalization.
                            </h3>
                            <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">
                                <label>Hospital Admission Date</label>
                                <input id="admission_date" name="admission_date" class="md-input" type="text" data-uk-datepicker="{format:'DD.MM.YYYY'}" required>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <label>Hospital Length of Stay(…… )Days</label>
                                <input id="stay_length" name="stay_length" class="md-input" type="number" required>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <label>Transfer date and Time</label>
                                <input id="transfer_date" name="transfer_date" class="md-input" type="text"  data-uk-datepicker="{format:'DD.MM.YYYY'}" required>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_a">Other informations.</h3>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-2">
                            <div class="uk-form-row">
                                <label>Reason for counter referral.</label>
                                <textarea id="transfer_reasons" name="transfer_reasons" cols="30" rows="4" class="md-input" required></textarea>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-2">
                            <div class="uk-form-row">
                                <label>Patient Diagnostic</label>
                                <textarea id="patient_diagnostic" name="patient_diagnostic" cols="30" rows="4" class="md-input" required></textarea>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-2">
                            <div class="uk-form-row">
                                <label>History of patient illness</label>
                                <textarea id="illness_history" name="illness_history" cols="30" rows="4" class="md-input" required></textarea>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-2">
                            <div class="uk-form-row">
                                <label>Past Medical / Surgical / OBGYN History.</label>
                                <textarea id="past_medical" name="past_medical" cols="30" rows="4" class="md-input" required></textarea>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-1">
                            <div class="uk-form-row">
                                <label>Summary of Hospital Name Admission (Including procedures, relevant lab or imaging results, etc.) .</label>
                                <textarea id="info_summary" name="info_summary" cols="30" rows="4" class="md-input" required></textarea>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-1">
                            <div class="uk-form-row">
                                <label>
                                    Recommendations and follow-up instructions to Next Medical Provider
                                </label>
                                <textarea id="recommendations" name="recommendations" cols="30" rows="4" class="md-input" required></textarea>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-2">
                            <button type="submit" class="md-btn md-btn-primary md-btn-large md-btn-wave-light">Save And Continues</a>

                            <p>
                                <div id="errors_section" style="display: none;" class="uk-alert uk-alert-danger" data-uk-alert>
                                    <a href="#" class="uk-alert-close uk-close"></a>
                                    
                                </div>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
    <?php include 'scripts.php'; ?>
    <script src="counter_referrals/js/index.js"></script>
</body>
</html>