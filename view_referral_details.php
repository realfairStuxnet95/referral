<?php
include 'class_loader.php';
if(isset($_GET['key']) && isset($_GET['title'])){
	///echo $_GET['id'];
    $hasCounterReferral=$referral->hasCounterReferral($_GET['key']);
    $counterReferral=array();
    $counterReferral=$referral->get_counter_referral($_GET['key']);
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
                                <ul class="md-list md-list-outside invoices_list" id="invoices_list">
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
                                    <div class="uk-input-group">
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
            {{#if invoice.header}}
                <div class="invoice_header md-bg-blue-grey-500">
                    <img src="assets/img/logo_light.png" alt="" height="30" width="140"/>
                    <img class="uk-float-right" src="assets/img/others/html5-css-javascript-logos.png" alt="" height="80" width="205"/>
                </div>
            {{/if}}
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
                            	$from_hospital=array();
                            	$from_hospital=$referral->from_hospital_info($_GET['key']);
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

    <script id="invoice_form_template_services" type="text/x-handlebars-template">
        {{#ifCond invoice_service_id '!==' 1}}
        <hr class="md-hr"/>
        {{/ifCond}}
        <div class="uk-grid" data-uk-grid-margin data-service-number="{{invoice_service_id}}">
            <div class="uk-width-medium-1-10 uk-text-center">
                <p class="uk-text-large">{{invoice_service_id}}.</p>
            </div>
            <div class="uk-width-medium-9-10">
                <div class="uk-grid uk-grid-small" data-uk-grid-margin>
                    <div class="uk-width-medium-5-10">
                        <label for="inv_service_{{invoice_service_id}}">Service Name</label>
                        <input type="text" class="md-input" id="inv_service_{{invoice_service_id}}" name="inv_service_id_{{invoice_service_id}}" />
                    </div>
                    <div class="uk-width-medium-1-10">
                        <label for="inv_service_{{invoice_service_id}}_rate">Rate</label>
                        <input type="text" class="md-input" id="inv_service_{{invoice_service_id}}_rate" name="inv_service_{{invoice_service_id}}_rate" />
                    </div>
                    <div class="uk-width-medium-1-10">
                        <label for="inv_service_{{invoice_service_id}}_hours">Hours</label>
                        <input type="text" class="md-input" id="inv_service_{{invoice_service_id}}_hours" name="inv_service_{{invoice_service_id}}_hours" />
                    </div>
                    <div class="uk-width-medium-1-10">
                        <label for="inv_service_{{invoice_service_id}}_vat">VAT</label>
                        <input type="text" class="md-input" id="inv_service_{{invoice_service_id}}_vat" name="inv_service_{{invoice_service_id}}_vat" />
                    </div>
                    <div class="uk-width-medium-2-10">
                        <label for="inv_service_{{invoice_service_id}}_vat">Total</label>
                        <input type="text" class="md-input" id="inv_service_{{invoice_service_id}}_vat" name="inv_service_{{invoice_service_id}}_vat" readonly/>
                    </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <label for="inv_service_{{invoice_service_id}}_desc">Description</label>
                        <textarea class="md-input" id="inv_service_{{invoice_service_id}}_desc" name="invoice_service_id_{{invoice_service_id}}_desc" cols="30" rows="2"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </script>

    <!-- google web fonts -->
    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
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
    <script src="referral/js/index.js"></script>
    <script src="referral/js/chat.js"></script>
    <script src="assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="assets/js/altair_admin_common.min.js"></script>

    <!-- page specific plugins -->
    <!-- handlebars.js -->
    <script src="bower_components/handlebars/handlebars.min.js"></script>
    <script src="assets/js/custom/handlebars_helpers.min.js"></script>
    <!-- instafilta -->
    <script src="assets/js/custom/instafilta.min.js"></script>


    <!--  invoices functions -->
    <script src="assets/js/pages/page_invoices.min.js"></script>
    
    <script>
        $(function() {
            if(isHighDensity()) {
                $.getScript( "assets/js/custom/dense.min.js", function(data) {
                    // enable hires images
                    altair_helpers.retina_images();
                });
            }
            if(Modernizr.touch) {
                // fastClick (touch devices)
                FastClick.attach(document.body);
            }
        });
        $window.load(function() {
            // ie fixes
            altair_helpers.ie_fix();
        });
    </script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','../www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-65191727-1', 'auto');
        ga('send', 'pageview');
    </script>

    <div id="style_switcher">
        <div style="display: none;" id="style_switcher_toggle"><i class="material-icons" style="display: none;">&#xE8B8;</i></div>
        <div class="uk-margin-medium-bottom">
            <h4 class="heading_c uk-margin-bottom">Colors</h4>
            <ul class="switcher_app_themes" id="theme_switcher">
                <li class="app_style_default active_theme" data-app-theme="">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_a" data-app-theme="app_theme_a">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_b" data-app-theme="app_theme_b">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_c" data-app-theme="app_theme_c">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_d" data-app-theme="app_theme_d">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_e" data-app-theme="app_theme_e">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_f" data-app-theme="app_theme_f">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_g" data-app-theme="app_theme_g">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_h" data-app-theme="app_theme_h">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_i" data-app-theme="app_theme_i">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_dark" data-app-theme="app_theme_dark">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
            </ul>
        </div>
        <div class="uk-visible-large uk-margin-medium-bottom">
            <h4 class="heading_c">Sidebar</h4>
            <p>
                <input type="checkbox" name="style_sidebar_mini" id="style_sidebar_mini" data-md-icheck />
                <label for="style_sidebar_mini" class="inline-label">Mini Sidebar</label>
            </p>
            <p>
                <input type="checkbox" name="style_sidebar_slim" id="style_sidebar_slim" data-md-icheck />
                <label for="style_sidebar_slim" class="inline-label">Slim Sidebar</label>
            </p>
        </div>
        <div class="uk-visible-large uk-margin-medium-bottom">
            <h4 class="heading_c">Layout</h4>
            <p>
                <input type="checkbox" name="style_layout_boxed" id="style_layout_boxed" data-md-icheck />
                <label for="style_layout_boxed" class="inline-label">Boxed layout</label>
            </p>
        </div>
        <div class="uk-visible-large">
            <h4 class="heading_c">Main menu accordion</h4>
            <p>
                <input type="checkbox" name="accordion_mode_main_menu" id="accordion_mode_main_menu" data-md-icheck />
                <label for="accordion_mode_main_menu" class="inline-label">Accordion mode</label>
            </p>
        </div>
    </div>

    <script>
        $(function() {
            var $switcher = $('#style_switcher'),
                $switcher_toggle = $('#style_switcher_toggle'),
                $theme_switcher = $('#theme_switcher'),
                $mini_sidebar_toggle = $('#style_sidebar_mini'),
                $slim_sidebar_toggle = $('#style_sidebar_slim'),
                $boxed_layout_toggle = $('#style_layout_boxed'),
                $accordion_mode_toggle = $('#accordion_mode_main_menu'),
                $html = $('html'),
                $body = $('body');


            $switcher_toggle.click(function(e) {
                e.preventDefault();
                $switcher.toggleClass('switcher_active');
            });

            $theme_switcher.children('li').click(function(e) {
                e.preventDefault();
                var $this = $(this),
                    this_theme = $this.attr('data-app-theme');

                $theme_switcher.children('li').removeClass('active_theme');
                $(this).addClass('active_theme');
                $html
                    .removeClass('app_theme_a app_theme_b app_theme_c app_theme_d app_theme_e app_theme_f app_theme_g app_theme_h app_theme_i app_theme_dark')
                    .addClass(this_theme);

                if(this_theme == '') {
                    localStorage.removeItem('altair_theme');
                    $('#kendoCSS').attr('href','bower_components/kendo-ui/styles/kendo.material.min.css');
                } else {
                    localStorage.setItem("altair_theme", this_theme);
                    if(this_theme == 'app_theme_dark') {
                        $('#kendoCSS').attr('href','bower_components/kendo-ui/styles/kendo.materialblack.min.css')
                    } else {
                        $('#kendoCSS').attr('href','bower_components/kendo-ui/styles/kendo.material.min.css');
                    }
                }

            });

            // hide style switcher
            $document.on('click keyup', function(e) {
                if( $switcher.hasClass('switcher_active') ) {
                    if (
                        ( !$(e.target).closest($switcher).length )
                        || ( e.keyCode == 27 )
                    ) {
                        $switcher.removeClass('switcher_active');
                    }
                }
            });

            // get theme from local storage
            if(localStorage.getItem("altair_theme") !== null) {
                $theme_switcher.children('li[data-app-theme='+localStorage.getItem("altair_theme")+']').click();
            }


        // toggle mini sidebar

            // change input's state to checked if mini sidebar is active
            if((localStorage.getItem("altair_sidebar_mini") !== null && localStorage.getItem("altair_sidebar_mini") == '1') || $body.hasClass('sidebar_mini')) {
                $mini_sidebar_toggle.iCheck('check');
            }

            $mini_sidebar_toggle
                .on('ifChecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_sidebar_mini", '1');
                    localStorage.removeItem('altair_sidebar_slim');
                    location.reload(true);
                })
                .on('ifUnchecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.removeItem('altair_sidebar_mini');
                    location.reload(true);
                });

        // toggle slim sidebar

            // change input's state to checked if mini sidebar is active
            if((localStorage.getItem("altair_sidebar_slim") !== null && localStorage.getItem("altair_sidebar_slim") == '1') || $body.hasClass('sidebar_slim')) {
                $slim_sidebar_toggle.iCheck('check');
            }

            $slim_sidebar_toggle
                .on('ifChecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_sidebar_slim", '1');
                    localStorage.removeItem('altair_sidebar_mini');
                    location.reload(true);
                })
                .on('ifUnchecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.removeItem('altair_sidebar_slim');
                    location.reload(true);
                });

        // toggle boxed layout

            if((localStorage.getItem("altair_layout") !== null && localStorage.getItem("altair_layout") == 'boxed') || $body.hasClass('boxed_layout')) {
                $boxed_layout_toggle.iCheck('check');
                $body.addClass('boxed_layout');
                $(window).resize();
            }

            $boxed_layout_toggle
                .on('ifChecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_layout", 'boxed');
                    location.reload(true);
                })
                .on('ifUnchecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.removeItem('altair_layout');
                    location.reload(true);
                });

        // main menu accordion mode
            if($sidebar_main.hasClass('accordion_mode')) {
                $accordion_mode_toggle.iCheck('check');
            }

            $accordion_mode_toggle
                .on('ifChecked', function(){
                    $sidebar_main.addClass('accordion_mode');
                })
                .on('ifUnchecked', function(){
                    $sidebar_main.removeClass('accordion_mode');
                });


        });
    </script>
</body>
</html>