$(document).ready(function(){
	var data=[];
	var url="system_department";
	var message="Saving Department";
	var deleteMessage="Do you want to delete this Department";
	var redirectUrl="dashboard?action=departments";
	var successMessage="successfully deleted";
	$("#btn_save").click(function(){
		data[0]="save_department";
		data[1]=$("#title").val();
		data[2]=$("#description").val();
		//alert(data[2]);
		saveModal(url,data,message,redirectUrl);
	});

	$("a.delete").click(function(){
		var action=$(this).attr("action");
		data[0]="remove_department";
		data[1]=action;
		//alert(data[1])
		confirmModal(url,data,deleteMessage,successMessage,redirectUrl);
	});
});