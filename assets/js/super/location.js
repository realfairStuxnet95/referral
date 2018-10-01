$(document).ready(function(){
	var data=[];
	var url="save_location";
	var message="Saving Location";
	var deleteMessage="Do you want to delete this Location";
	var redirectUrl="dashboard?action=region";
	var successMessage="successfully deleted";
	$("#btn_save").click(function(){
		data[0]="save_location";
		data[1]=$("#title").val();
		data[2]=$("#description").val();

		saveModal(url,data,message,redirectUrl);
	});

	$("a.delete").click(function(){
		var action=$(this).attr("action");
		data[0]="remove_location";
		data[1]=action;
		//alert(data[1])
		confirmModal(url,data,deleteMessage,successMessage,redirectUrl);
	});
});