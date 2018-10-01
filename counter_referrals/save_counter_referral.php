<?php 
include '../class_loader.php';


//patient information
$patient_name=$function->sanitize($_POST['patient_fname']);
$patient_surname=$function->sanitize($_POST['patient_lname']);
$patient_id_no=$function->sanitize($_POST['patient_id_no']);
$patient_phone=$function->sanitize($_POST['patient_phone']);
$patient_dob=$function->sanitize($_POST['patient_dob']);
$patient_sex=$function->sanitize($_POST['patient_sex']);

//hospitals info.
$from_hospital_name=$function->sanitize($_POST['from_hospital_name']);
$from_hospital_id=$function->sanitize($_POST['from_hospital']);
$physician_names=$function->sanitize($_POST['physician_names']);;
$physician_phone=$function->sanitize($_POST['physician_phone']);

//mode of transport
$mode_of_transport=$function->sanitize($_POST['mode_of_transport']);

//hospitalization
$hospital_admission_date=$function->sanitize($_POST['admission_date']);
$stay_length=$function->sanitize($_POST['stay_length']);
$transfer_date=$function->sanitize($_POST['transfer_date']);

//other information
$transfer_reasons=$function->sanitize($_POST['transfer_reasons']);
$patient_diagnostics=$function->sanitize($_POST['patient_diagnostic']);
$illness_history=$function->sanitize($_POST['illness_history']);
$past_medical=$function->sanitize($_POST['past_medical']);
$info_summary=$function->sanitize($_POST['info_summary']);
$recommendations=$function->sanitize($_POST['recommendations']);

//referral information
$referral_id=$function->sanitize($_POST['referral']);
$counter_ref_id=$referral->create_counter_referral_id();
//to hospital information
$to_hospital_name =$function->sanitize($_POST['to_hospital_name']);
$to_hospital_id=$function->sanitize($_POST['to_hospital']);
$receive_department=$function->sanitize($_POST['receive_department']);

$save_status=$referral->save_counter_referral($counter_ref_id,$referral_id,$patient_name,$patient_surname,
											$patient_id_no,$patient_phone,$patient_dob,$patient_sex,
											$from_hospital_name,$from_hospital_id,$to_hospital_name, 
											$to_hospital_id,$physician_names,$physician_phone,
											$mode_of_transport,$receive_department,$hospital_admission_date,
											$stay_length,$transfer_date,$transfer_reasons,$patient_diagnostics,
											$illness_history,$past_medical,$info_summary,$recommendations);
if($save_status){
	echo "counter referral saved successfully";
}else{
	die(mysqli_error($con));
}
?>