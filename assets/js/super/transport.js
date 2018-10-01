$(document).ready(function(){
	var data=[];
	var url="save_transport";
	var message="Saving Transport MOde";
	var deleteMessage="Do you want to delete this Mode";
	var redirectUrl="dashboard?action=transport";
	var successMessage="successfully deleted";
	$("#btn_save").click(function(){
		data[0]="save_transport";
		data[1]=$("#title").val();
		//alert(data[1]);
		saveModal(url,data,message,redirectUrl);
	});

	$("a.delete").click(function(){
		var action=$(this).attr("action");
		data[0]="remove_transport";
		data[1]=action;
		//alert(data[1])
		confirmModal(url,data,deleteMessage,successMessage,redirectUrl);
	});
});