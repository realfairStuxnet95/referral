$(document).ready(function(){
	var status;
	var action;
	var requestUrl="incoming_referral_actions";
	var data=[];
	var message="Do you want to update this status";
	var successMessage="Referral successfull Updated";
	var redirectUrl="dashboard?action=tabbed";
	$("a.updateStatus").click(function(){
		status=$(this).attr("status");
		//alert(status);
	});

	$("#status_to_update").change(function(){
		var selectedItem=$(this).val();
		if(selectedItem.match("SCHEDULED")){
			showScheduleDiv();
		}else{
			hideScheduleDiv();
		}
	});
	$("#department_to_receive").change(function(){
		var action=$(this).val();
		var to_hospital=$("#to_hospital").val();
		getDepartmentDoctors(to_hospital,action);
	});
	$("#btn_update_status").click(function(){
		var date_field=$("#uk_dp_1").val();
		var time_field=$("#usr_time").val();
		var department=$("#department_to_receive").val();
		var doctor=$("#doctor_to_receive").val();
		var to_hospital=$("#to_hospital").val();
		status=$("#status_to_update").val();
		action=$("#action").val();
		//validate input
		if(status.match("SCHEDULED")){
			if(date_field.length>=3 && time_field.length>=3){
				if(department.length>=1 && doctor.length>=1){
					data[0]=status;
					data[1]=action;
					data[2]=date_field;
					data[3]=time_field;
					data[4]=department;
					data[5]=doctor;
					data[6]=to_hospital;
					confirmModal(requestUrl,data,message,successMessage,redirectUrl);
				}else{
					display_errors("Please Set Receive Department and Doctor");
				}
			}else{
				display_errors("Please Set Date and Time For Scheduled Referral");
			}
		}else{
			data[0]=status;
			data[1]=action;
			confirmModal(requestUrl,data,message,successMessage,redirectUrl);
		}
		
	});
});

function showScheduleDiv(){
	$("#div_schedule").slideDown();
	$("#div_time").slideDown();
	$("#div_dept").slideDown();
	$("#div_doctor").slideDown();	
}
function hideScheduleDiv(){
	$("#div_schedule").slideUp();
	$("#div_time").slideUp();
	$("#div_dept").slideUp();
	$("#div_doctor").slideUp();	
}
function getDepartmentDoctors(hospital,department){
	$.ajax({
		url:"get_doctors?hospital="+hospital+"&department="+department,
		method:'GET',
		data:hospital,
		dataType: 'json'
	}).done(function(data){
		//console.log(data);
		$("#doctor_to_receive>option").remove();
		$("#doctor_to_receive").append('<option value="">Select Doctor</option>');
		$.map(data, function(doctor, i){
			$("#doctor_to_receive").append('<option value='+doctor.doctor_id+'>'+doctor.names+'</option>');
		});
	});
}
function display_errors(error){
	UIkit.modal.alert(error);
}