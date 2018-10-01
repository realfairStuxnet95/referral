INSERT INTO `referrals` 
(`referral_id`, `patient_fname`, `patient_lname`, `patient_id_no`,
 `patient_phone`, `patient_dob`, `patient_sex`, `from_hospital_name`,
  `from_hospital_id`, `to_hospital_name`, `physician_name`, `physician_phone`, 
  `to_hospital_id`, `mode_of_transport`, `mode_of_transport_id`, `hospital_admission_date`,
   `hospital_stay_length`, `tranfer_date_time`, `transfer_reasons`, `patient_diagnostic`,
    `illness_history`, `past_medical`, `info_summary`, `summary_attachment`,
     `status`, `regDate`) 
	VALUES 
  (NULL, '', '', '', 
  	'', '', '', '', 
  	'', '', '', '',
  	 '', '', '', '', 
  	 '', '', '', '', 
  	 '', '', '', '', 
  	 '', CURRENT_TIMESTAMP);
