<?php
include 'class_loader.php';
if(isset($_GET['key']) && isset($_GET['title'])){
    $referral_id=$function->sanitize($_GET['key']);
    $hasCounterReferral=$referral->hasCounterReferral($_GET['key']);
    $counterReferral=array();
    $counterReferral=$referral->get_counter_referral($_GET['key']);
    $from_hospital=$referral->from_hospital_info($_GET['key']);
    $hospital_logo="";
    $hospital_id=0;
    $logo_url="";
    //var_dump($from_hospital);
}else{
	header("Location:dashboard");
}
require 'auth.php';
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

    <title>Viewing referral Transfer for <?php echo $_GET['title']; ?></title>
    <!-- uikit -->
    <link rel="stylesheet" href="bower_components/uikit/css/uikit.almost-flat.min.css" media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="assets/icons/flags/flags.min.css" media="all">

    <!-- style switcher -->
    <link rel="stylesheet" href="assets/css/style_switcher.min.css" media="all">
    
    <!-- altair admin -->
    <link rel="stylesheet" href="assets/css/main.min.css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- themes -->
    <link rel="stylesheet" href="assets/css/themes/themes_combined.min.css" media="all">
</head>
<body class="disable_transitions sidebar_main_open sidebar_main_swipe header_double_height">
    <!-- main header -->
    <?php include_once 'navigations.php'; ?>
    <!-- main header end -->
    <!-- main sidebar -->
    <?php include_once 'sidebar_menu.php'; ?>
    <!-- main sidebar end -->

    <div id="page_content">
        <div id="page_content_inner">

            <div class="uk-width-medium-10-10 uk-container-center reset-print">
                <div class="uk-grid uk-grid-collapse" data-uk-grid-margin>
                    <div class="uk-width-large-7-10">
                        <div class="md-card md-card-single main-print" id="invoice">
                            <div id="invoice_preview"></div>
                            <div id="invoice_form"></div>
                        </div>
                    </div>
                    <div class="uk-width-large-3-10 hidden-print uk-visible-large">
                        <div class="md-list-outside-wrapper">
                            <div class="md-list-outside-search">
                                <input type="text" class="md-input inverted-colors" placeholder="Find In chat..." id="invoice-filtering"/>
                            </div>
                            <div class="md-list-outside-inner">
                                <ul class="md-list md-list-outside invoices_list" id="invoices_list" style="background: #fff;">
                                    <li class="heading_list">Referral Comments.</li>
                                    <li style="display: none;">
                                        <a href="#" class="md-list-content" data-invoice-id="22">
                                            <span class="md-list-heading uk-text-truncate">Invoice 198/2015 <span class="uk-text-small uk-text-muted">(23 Oct)</span></span>
                                            <span class="uk-text-small uk-text-muted">Terry Inc</span>
                                        </a>
                                    </li>
                                    <li class="loader" style="display: none;border-bottom: none;">
                                        <center>
                                            <div id="loader" style="" class="uk-width-medium-1-4">
                                                <div class="md-preloader"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" height="48" width="48" viewbox="0 0 75 75"><circle cx="37.5" cy="37.5" r="33.5" stroke-width="4"/></svg></div>
                                            </div>
                                        </center>
                                    </li>
                                    <div id="chat_output" style="padding:10px;" class="uk-width-medium-1-1">
                                    </div>
                                    <hr>
                                    <div class="uk-input-group" style="">
                                        <div class="md-input-wrapper">
                                            <label>Add your comment</label>
                                            <textarea id="message" class="md-input"></textarea>
                                            <span class="md-input-bar "></span>
                                        </div>
                                        <span class="uk-input-group-addon">
                                            <button id="btn_send" class="md-btn md-btn-primary md-btn-mini md-btn-wave-light">SEND</button>
                                        </span>
                                    </div>
                                 </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div style="display: none;" class="md-fab-wrapper">
        <a class="md-fab md-fab-accent md-fab-wave-light" href="#" id="invoice_add">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>

    <div id="sidebar_secondary">
        <div class="sidebar_secondary_wrapper uk-margin-remove"></div>
    </div>

    <script id="invoice_template" type="text/x-handlebars-template">
        <div class="md-card-toolbar{{#if invoice.header}} hidden-print{{/if}}">
            <div class="md-card-toolbar-actions hidden-print">
                <i class="md-icon material-icons" id="invoice_print">&#xE8ad;</i>
                <?php 
                //check if referral has no counter referral
                
                if(!$hasCounterReferral){
                    ?>
                <a href="counter_referral?ref=<?php echo $_GET['key']; ?>&title=<?php echo $_GET['title']; ?>" class="md-btn md-btn-primary md-btn-mini md-btn-wave-light">
                SEND COUNTER REFERRAL
                </a>
                    <?php
                }
                ?>
            </div>
            <h3 class="md-card-toolbar-heading-text large" id="invoice_name">
                <strong>Referral Transfer for : 
                <font style="color: #009966;">
                	<?php 
                	echo $referral->get_referral_patient($_GET['key']);
                	?>
                </font>
                </strong>
            </h3>
        </div>
        <div class="md-card-content invoice_content print_bg{{#if invoice.footer}} invoice_footer_active{{/if}}">
            <div style="font-weight: bold;float:right;">
                <p>
                    <?php 
                    foreach ($from_hospital as $key => $value) {
                        $hospital_id=(int)$value['hospital_id'];
                        $hospital_logo=$hospital->getHospitalLogo($hospital_id);
                    }
                    if($hospital_logo!=""){
                        $logo_url="system_images/hospitals/".$hospital_logo;
                    }else{
                        $logo_url="assets/img/logo/logo_text.png";
                    }
                    ?>

                </p>
                <img src="<?php echo $logo_url; ?>" style="width:120px;">
            </div>
            <div style="font-weight: bold;" class="uk-margin-medium-bottom">
            	<?php 
            	$dates=$referral->referral_dates($_GET['key']);
            	foreach ($dates as $key => $value) {
            		?>
                <span class="uk-text-muted uk-text-small uk-text-italic">Admission Date:</span>
                <?php echo $value['hospital_admission_date']; ?> 
                <br/>
                <span class="uk-text-muted uk-text-small uk-text-italic">Transfer Date:</span>
                <?php echo $value['tranfer_date']; ?> 
                <br/>
                <span class="uk-text-muted uk-text-small uk-text-italic">Saved :</span>
                <?php echo $function->formatDate( $value['regDate']); ?> 
                <br/>           
            		<?php
            	}
            	?>
            </div>
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-small-3-5">
                    <div class="uk-margin-bottom">
                        <span class="uk-text-muted uk-text-small uk-text-italic">From:</span>
                        <address>
                            	<?php
                            	foreach ($from_hospital as $key => $value) {
                            		?>
                            		<p>
                            			Hospital:
                            			<strong>
                            				<?php echo $value['hospital_name']; ?>
                            			</strong>
                            		</p>
                            		<p>
                            			Location:
                            			<strong>
                            				<?php echo $value['region_title']; ?>
                            			</strong>
                            		</p>
                            		<p>
                            			Director:
                            			<strong>
                            				<?php echo $value['director_name']; ?>
                            			</strong>
                            		</p>
                            		<?php
                            	 	
                            	 } 
                            	?>
                        </address>
                    </div>
                    <div class="uk-margin-medium-bottom">
                        <span class="uk-text-muted uk-text-small uk-text-italic">To:</span>
                        <address>
                            	<?php
                            	$to_hospital=array();
                            	$to_hospital=$referral->to_hospital_info($_GET['key']);
                            	foreach ($to_hospital as $key => $value) {
                            		?>
                            		<p>
                            			Hospital:
                            			<strong>
                            				<?php echo $value['hospital_name']; ?>
                            			</strong>
                            		</p>
                            		<p>
                            			Location:
                            			<strong>
                            				<?php echo $value['region_title']; ?>
                            			</strong>
                            		</p>
                            		<p>
                            			Director:
                            			<strong>
                            				<?php echo $value['director_name']; ?>
                            			</strong>
                            		</p>
                            		<?php
                            	 	
                            	 } 
                            	?>
                        </address>
                    </div>
                </div>
                <div class="uk-width-small-2-5">
                    <span class="uk-text-muted uk-text-small uk-text-italic">
                        <strong>
                            Patient Info:
                        </strong>
                    </span>
                    <p>
                        <?php 
                        $patient_info=array();
                        $patient_info=$referral->get_patient_info($_GET['key']);
                        foreach ($patient_info as $key => $value) {
                            echo 'Patient Names:<b> '.$value['patient_fname'].' '.$value['patient_lname'].'</b>';
                            echo '<br>Patient ID No:<b> '.$value['patient_id_no'].'</b>';
                            echo '<br>Patient Phone:<b> '.$value['patient_phone'].'</b>';
                            echo '<br>Patient Gender:<b> '.$value['patient_sex'].'</b>';
                            echo '<br>Patient DOB:<b> '.$value['patient_dob'].'</b>';
                            
                            if(!empty($value['guardian']) && !empty($value['guardian_phone'])){
                                echo '<br>Guardian:<b>'.$value['guardian'].'</b>';
                                echo '<br>Guardian Phone:<b>'.$value['guardian_phone'].'</b>';
                            }
                        }
                        ?>
                        
                    </p>
                    <span class="uk-text-muted uk-text-small uk-text-italic">
                    	<strong>
                    		Other Info:
                    	</strong>
                    </span>
                	<?php 
                	$other_info=array();
                	$other_info=$referral->get_other_referral_info($_GET['key']);
                	foreach ($other_info as $key => $value) {
                		?>
                    <p>
                    	Receiving Department: 
                    	<font class="uk-text-success">
                    		<?php echo $referral->get_receive_department($_GET['key']); ?>
                    	</font>
                    	<br>
                    	Physician Names:
                    	<font class="uk-text-success">
                    		<?php echo $value['physician_name']; ?>
                    	</font><br>
                    	Physician Phone:
                    	<font class="uk-text-success">
                    		<?php echo $value['physician_phone']; ?>
                    	</font><br>
                    	Transport Mode:
                    	<font class="uk-text-success">
                    		<?php echo $value['mode_of_transport']; ?>
                    	</font><br>
                    </p>
                		<?php
                	}
                	?>
                </div>
            </div>
            <div class="uk-grid uk-margin-large-bottom">
                <div class="uk-width-1-1">
                    <table class="uk-table">
                        <thead>
                            <tr class="uk-text-upper">
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php
                        	$referral_info=array();
                        	$referral_info=$referral->get_referral_description($_GET['key']);
                        	foreach ($referral_info as $key => $value) {
                        		?>
                        	<tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">
                                    	Referral Patient Diagnostic
                                    </span><br/><br>
                                    <span class="uk-text-muted uk-text-small">
                                    	<?php echo $value['patient_diagnostic'] ?>
                                    </span>
                                    <br><br>
                                    <span class="uk-text-large">
                                    	Referral Illness History
                                    </span><br/>
                                    <span class="uk-text-muted uk-text-small">
                                    	<?php echo $value['illness_history'] ?>
                                    </span>
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                            	<td><br><br>
                                    <span class="uk-text-large">
                                    	Referral Past Medical Records
                                    </span><br/>
                                    <span class="uk-text-muted uk-text-small">
                                    	<?php echo $value['past_medical'] ?>
                                    </span><br/><br><br>
									<span class="uk-text-large">
                                    	Referral Info Summary
                                    </span><br/>
                                    <span class="uk-text-muted uk-text-small">
                                    	<?php echo $value['info_summary'] ?>
                                    </span>
                            	</td>
                            </tr>
                        		<?php
                        	}
                        	?>
                        </tbody>
                    </table>
                    <?php 
                    if($hasCounterReferral){
                        ?>
                    <div class="md-card">
                        <div class="md-card-content">
                            <h3 class="heading_a uk-margin-bottom">Counter Referral</h3>
                            <div class="uk-accordion" data-uk-accordion="{showfirst: false}" data-accordion-section-open="2">
                                <?php 
                                foreach ($counterReferral as $key => $value) {
                                    ?>
                                <h3 class="uk-accordion-title uk-accordion-title-primary">
                                    Click to View Counter referral 
                                </h3>
                                <div class="uk-accordion-content">
                                    <div class="uk-width-large-1-1 uk-width-medium-1-1">
                                        <ul class="md-list md-list-addon">
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons">person</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="uk-text-small uk-text-muted">
                                                    Patient Names
                                                    </span>
                                                    <span class="md-list-heading" style="font-weight: bold;">
                                                        <?php echo $value['patient_name'].' '.$value['patient_surname']; ?>
                                                    </span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons">person</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="uk-text-small uk-text-muted">
                                                    Patient DOB & Gender
                                                    </span>
                                                    <span class="md-list-heading" style="font-weight: normal;">
                                                        <?php echo 'DOB: <b>'.$value['patient_dob'].
                                                                   '</b><br>Gender: <b>'.$value['patient_sex'].'</b>'; ?>
                                                    </span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons uk-text-success">info</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="uk-text-small uk-text-muted">
                                                    Patient Phone & ID Number
                                                    </span>
                                                    <span class="md-list-heading" style="font-weight: bold;">
                                                        <?php echo 'Phone: <b>'.$value['patient_phone'].
                                                                  '<b><br>ID NO: '.$value['patient_id_no'].'</b>'; ?>
                                                    </span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons">&#xE8B2;</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">From Hospital Info</span>
                                                    <span class="md-list-heading" style="font-weight: normal;">
                                                        <?php echo 'Hospital Name: <b>'.$value['from_hospital_name'].
                                                        '</b><br>Physician names : <b>'.$value['physician_names'].
                                                        '</b><br>Physician Phone : <b>'.$value['physician_phone'].
                                                        '</b><br> Transport Mode :'.$value['mode_of_transport'].'</b>'; ?>
                                                    </span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons">&#xE8B2;</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">To Hospital Info</span>
                                                    <span class="md-list-heading" style="font-weight: normal;">
                                                        <?php echo 'Hospital Name: <b>'.$value['to_hospital_name'].
                                                        '</b><br>Receive Department : <b>'.$value['receive_department'].'</b>'; ?>
                                                    </span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons">&#xE8B2;</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">Transfer Dates</span>
                                                    <span class="md-list-heading" style="font-weight: bold;">
                                                        <?php echo 'Hospital Admin Date: <b>'.$value['hospital_admission_date'].
                                                        '</b><br>Transfer Date: <b>'.$value['transfer_date'].
                                                        '</b><br>Stay Lenght :'.$value['stay_length'].'</b>'; ?>
                                                    </span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons">&#xE8B2;</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">Transfer Reasons</span>
                                                    <span class="uk-text-small uk-text-muted" style="font-weight: bold;">
                                                        <?php echo $value['transfer_reasons']; ?>
                                                    </span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons">&#xE8B2;</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">Transfer Reasons</span>
                                                    <span class="uk-text-small uk-text-muted" style="font-weight: bold;">
                                                        <?php echo $value['transfer_reasons']; ?>
                                                    </span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons">&#xE8B2;</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">Patient Diagnostic</span>
                                                    <span class="uk-text-small uk-text-muted" style="font-weight: bold;">
                                                        <?php echo $value['patient_diagnostics']; ?>
                                                    </span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons">&#xE8B2;</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">Illness History</span>
                                                    <span class="uk-text-small uk-text-muted" style="font-weight: bold;">
                                                        <?php echo $value['illness_history']; ?>
                                                    </span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons">&#xE8B2;</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">Past Medical</span>
                                                    <span class="uk-text-small uk-text-muted" style="font-weight: bold;">
                                                        <?php echo $value['past_medical']; ?>
                                                    </span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons">&#xE8B2;</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">Info Summary</span>
                                                    <span class="uk-text-small uk-text-muted" style="font-weight: bold;">
                                                        <?php echo $value['info_summary']; ?>
                                                    </span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons">&#xE8B2;</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">Recommendations</span>
                                                    <span class="uk-text-small uk-text-muted" style="font-weight: bold;">
                                                        <?php echo $value['recommendations']; ?>
                                                    </span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <span class="uk-text-muted uk-text-small uk-text-italic">
                        <h5>Available Attachments</h5>
                    </span>
                    <?php 
                    //get available referral attachments
                    $attachments=$referral->get_referral_attachments($referral_id);
                    $images=array("image/jpeg","image/png","image/jpg","image/gif");
                    if(count($attachments)>0){
                        foreach ($attachments as $key => $attach) {
                            if(in_array($attach['type'], $images)){
                                ?>
                                <a href="<?php echo 'referral_attachments/'.$attach['file_name']; ?>" target="_blank">
                                    <img src="<?php echo 'referral_attachments/'.$attach['file_name']; ?>" style="width:100px;height: auto;">
                                </a>
                                <?php
                            }else{
                                ?>
                                <a href="<?php echo 'referral_attachments/'.$attach['file_name']; ?>" target="_blank">
                                    <img src="assets/img/avatars/file.png" style="width: 90px;height: auto;">
                                </a>
                                <?php
                            }
                        }
                    }else{
                        ?>
                        <div class="uk-alert uk-alert-danger" data-uk-alert="">
                            <a href="#" class="uk-alert-close uk-close"></a>
                            No attachment available on this referral.
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="uk-width-1-1">
            	    	<?php 
			    	 
				    	 $info=$system->login_title();
				    	 foreach ($info as $key => $value) {
				    	 	?>
                    		<span class="uk-text-muted uk-text-small uk-text-italic">
                    		Printed From:<?php echo $value['name']; ?>
				    	 	</span>
		                    <p class="uk-margin-top-remove">
		                    	Visit on: <a href="<?php echo $value['url'] ?>" target="_blank">
		                    		Click Here
		                    	</a>
		                    </p>
		                    <p class="uk-margin-top-remove">
		                    	<sub>
		                    		Created on: <?php echo date("Y-m-d h:i:s a") ?>
		                    	</sub>
		                    </p>
				    	 	<?php
				    	 	
				    	 }
				    	?>
                    
                </div>
            </div>
        </div>
    </script>
    <!-- common functions -->
    <script src="assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script type="text/javascript">
        const referral_id="<?php echo $_GET['key']; ?>";
        const current_user="<?php echo $_SESSION['user_id']; ?>";
        const current_user_type="<?php echo $_SESSION['user_type']; ?>";
        const current_user_name="<?php echo $_SESSION['names']; ?>";
    </script>
    <?php 
    include 'views/utils/detail_scripts.php';
    ?>
</body>
</html>