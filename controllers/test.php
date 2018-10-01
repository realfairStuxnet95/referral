<?php 
require '../includes/database.inc.php';
include 'Doctor.php';
include 'Nurse.php';
include 'Referral.inc.php';


$referral_id=$referral->create_referral_id();
$patient_fname="1";
$patient_lname="1";
$patient_id_no="1";
$patient_phone="1";
$patient_dob="1";
$patient_sex="1";
$from_hospital_name="1";
$from_hospital_id="3";
$to_hospital_name="1";
$physician_name="1";
$physician_phone="1";
$to_hospital_id="1";
$mode_of_transport="1";
$mode_of_transport_id="1";
$hospital_admission_date="1";
$stay_length="1";
$tranfer_date="1";
$transfer_reasons="1";
$patient_diagnostic="1";
$illness_history="1";
$past_medical="1";
$info_summary="dsdsjhdjshdsjdhsjdhsj''dsdhshdgsujdhsj@@@jnhskjdhskjdhsdhjsdjhsj,''";
$attachments="1";
$status="1";
$save_status=$referral->save_referral($referral_id,$patient_fname,$patient_lname,$patient_id_no,
		$patient_phone,$patient_dob,$patient_sex,$from_hospital_name,
		$from_hospital_id,$to_hospital_name,$physician_name,$physician_phone,
		$to_hospital_id,$mode_of_transport,$mode_of_transport_id,$hospital_admission_date,
		$stay_length,$tranfer_date,$transfer_reasons,$patient_diagnostic,
		$illness_history,$past_medical,$info_summary,$attachments,
		$status);
if($save_status){
	echo "saved";
}
?>