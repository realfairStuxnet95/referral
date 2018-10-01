$(document).ready(function(){
	var data=[];
	var url="save_category";
	var message="Saving Category";
	var deleteMessage="Do you want to delete this Category";
	var redirectUrl="dashboard?action=category";
	var successMessage="successfully deleted";
	$("#btn_save").click(function(){
		data[0]="save_category";
		data[1]=$("#title").val();
		data[2]=$("#description").val();
		alert(data[2]);
		saveModal(url,data,message,redirectUrl);
	});

	$("a.delete").click(function(){
		var action=$(this).attr("action");
		data[0]="remove_category";
		data[1]=action;
		//alert(data[1])
		confirmModal(url,data,deleteMessage,successMessage,redirectUrl);
	});
});