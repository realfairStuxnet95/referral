$(document).ready(function(){
	$("#form-file").on("change",function(){
		var files=$(this)[0].files;
		var files_length = $(this)[0].files.length;
		if(files_length>10){
			alert("You can Upload no more than 10 files");
			$(this).val("");
		}else{
		$("#selected").html("You are about to upload "+files_length+" Files").css({
			color:'green'
		});
		$("#has_upload").val("yes");
		}
	});

	$("#btn_finish").on('click',function(){
		var admission_date=$("#admission_date").val();
		var stay_length=$("#stay_length").val();
		var transfer_date=$("#transfer_date").val();
		var transfer_reason=$("#transfer_reason").val();
		var patient_diagnostic=$("#patient_diagnostic").val();
		var patient_history=$("#patient_history").val();
		var past_medical=$("#past_medical").val();
		var summary=$("#summary").val();
		var has_upload=$("#has_upload").val();

		var referral=$("#steps").attr("accesskey");
		if(admission_date.length>=3){
			if(stay_length.length>0){
				if(transfer_date.length>=3){
					if(transfer_reason.length>=0){
						if(patient_diagnostic.length>=0){
							if(patient_history.length>=0){
								if(past_medical.length>=0){
									if(summary.length>=0){
										var form_data = new FormData();
										form_data.append("admission_date", admission_date);	
										form_data.append("stay_length", stay_length);	
										form_data.append("transfer_date", transfer_date);	
										form_data.append("transfer_reason", transfer_reason);	
										form_data.append("patient_diagnostic", patient_diagnostic);	
										form_data.append("patient_history", patient_history);
										form_data.append("past_medical", past_medical);
										form_data.append("summary", summary);
										form_data.append("referral", referral);
										$.ajax({
											url:"step3",
										    method:"POST",
										    data: form_data,
										    contentType: false,
										    cache: false,
										    processData: false,
										    beforeSend:function(){
										     //show loader
										    },   
										    success:function(data)
										    {
										    	if(data.match("1")){
										    		$("#card_loader").load("referral/step4.php");
										    	}
										    }
										});

									}else{
										display_errors("Summary Must be self explanatory");
									}
								}else{
									display_errors("Please specify well Past Medical Records");
								}
							}else{
								display_errors("Please add Patient History");
							}
						}else{
							display_errors("Please add Valid Patient diagnostics");
						}
					}else{
						display_errors("Please add enough transfer Reasons");
					}
				}else{
					display_errors("Please select Transfer Date");
				}
			}else{
				display_errors("Invalid Stay length");
			}
		}else{
			display_errors("Please select Admission Date");
		}
	});
});

function display_errors(error){
    UIkit.modal.alert(error);
}