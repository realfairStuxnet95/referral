$(document).ready(function(){
	var requestUrl="save_counter_referral";
	//var modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>Please wait...<br/><img class=\'uk-margin-top\' src=assets/img/loader/loader.gif style=\width:100px\ alt=\'\'>');
	$("#frm_counter").submit(function(e){
		e.preventDefault();
		var patient_fname=$("#patient_fname").val();
		var patient_lname=$("#patient_lname").val();
		var patient_id_no=$("#patient_id_no").val();
		var patient_phone=$("#patient_phone").val();
		var patient_dob=$("#patient_dob").val();
		var patient_sex=$("#patient_sex").val();
		//to hospital
		var to_hospital=$("#to_hospital").val();
		var receive_department=$("#receive_department").val();
		var to_hospital_name=$("#to_hospital_name").val();
		//from h
		var from_hospital_name=$("#from_hospital_name").val();
		var from_hospital=$("#from_hospital").val();
		var physician_names=$("#physician_names").val();
		var physician_phone=$("#physician_phone").val();
		//transport
		var mode_of_transport=$("#mode_of_transport").val();
		//hospitalization
		var admission_date=$("#admission_date").val();
		var stay_length=$("#stay_length").val();
		var transfer_date=$("#transfer_date").val();
		//other info
		var transfer_reasons=$("#transfer_reasons").val();
		var patient_diagnostic=$("#patient_diagnostic").val();
		var illness_history=$("#illness_history").val();
		var past_medical=$("#past_medical").val();
		var info_summary=$("#info_summary").val();
		var recommendations=$("#recommendations").val();
		var referral=$("#referral").val();
		alert(referral);
		$.post(requestUrl,{
			patient_fname:patient_fname,
			patient_lname:patient_lname,
			patient_id_no:patient_id_no,
			patient_phone:patient_phone,
			patient_dob:patient_dob,
			patient_sex:patient_sex,
			to_hospital_name:to_hospital_name,
			to_hospital:to_hospital,
			receive_department:receive_department,
			from_hospital_name:from_hospital_name,
			from_hospital:from_hospital,
			physician_names:physician_names,
			physician_phone:physician_phone,
			mode_of_transport:mode_of_transport,
			admission_date:admission_date,
			stay_length:stay_length,
			transfer_date:transfer_date,
			transfer_reasons:transfer_reasons,
			patient_diagnostic:patient_diagnostic,
			illness_history:illness_history,
			past_medical:past_medical,
			info_summary:info_summary,
			recommendations:recommendations,
			referral:referral
		},function(data){
			alert(data);
		});
	});
});