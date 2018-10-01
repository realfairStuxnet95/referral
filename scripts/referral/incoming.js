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
			$("#div_schedule").slideDown();
		}else{
			$("#div_schedule").slideUp();
		}
	});

	$("#btn_update_status").click(function(){
		status=$("#status_to_update").val();
		action=$("#action").val();

		data[0]=status;
		data[1]=action;
		
		confirmModal(requestUrl,data,message,successMessage,redirectUrl);
	});
});