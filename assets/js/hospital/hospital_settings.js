$(document).ready(function(){
	//initialize components
	var data=[];
	var url="hospital_settings";
	var message="Saving Settings";
	var deleteMessage="Do you want to delete this Settings";
	var redirectUrl="dashboard?action=hospital_settings";
	var successMessage="successfully deleted";

	$("#btn_save_settings").click(function(){
		data[0]="save_settings";
		data[1]=$("#name").val();
		data[2]=$("#title").val();
		data[3]=$("#address").val();
		data[4]=$("#phone").val();
		data[5]=$("#email").val();
		data[6]=$("#description").val();
		data[7]=$("#action").val();
		
		saveModal(url,data,message,redirectUrl);

	});
});