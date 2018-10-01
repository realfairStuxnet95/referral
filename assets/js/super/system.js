$(document).ready(function(){
	var data=[];
	var redirect_url="dashboard?action=system_settings";
	var loaderMsg="Please wait......";
	var message="do you want to change system setting";
	$("#btn_save_settings").click(function(){
		data[0]=$("#name").val();
		data[1]=$("#title").val();
		data[2]=$("#description").val();
		data[3]=$("#email").val();
		data[4]=$("#address").val();
		data[5]=$("#phone").val();

		ajax_confirm(message,"save_system",data,redirect_url,"Successfully Saved");
	});
});