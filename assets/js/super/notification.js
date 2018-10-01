$(document).ready(function(){
	var data=[];
	var url="save_announcement";
	var message="Saving System message";
	var deleteMessage="Do you want to delete this Message (No undone actions )";
	var redirectUrl="dashboard?action=system_messages";
	var successMessage="successfully deleted";
	
	$("#btn_save").click(function(){
		data[0]="save_message";
		data[1]=$("#title").val();//
		data[2]=$("#category").val();
		data[3]=$("#description").val();
		data[4]=$("#target").val();

		saveModal(url,data,message,redirectUrl);
	});

	$("a.delete").click(function(){
		var action=$(this).attr("action");
		data[0]="remove_message";
		data[1]=action;
		//alert(data[1]);
		confirmModal(url,data,deleteMessage,successMessage,redirectUrl);
	});
});