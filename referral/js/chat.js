$(document).ready(function(){
	//get
	var requestUrl="get_chats";
	var data=[];
	var outputDiv=$("#chat_output");
	var loader=$("li.loader");
	data[0]="get_chats";
	data[1]=referral_id;
	loadChats(requestUrl,data,outputDiv,loader);
	$("#btn_send").click(function(){
		var message=$("#message").val();
		if(message.length>0){
			data[0]="save_chat";
			data[1]=referral_id;
			data[2]=message;
			data[3]=current_user;
			data[4]=current_user_type;
			data[5]=current_user_name;

			loadChats(requestUrl,data,outputDiv,loader);
			$("#message").val("");
		}
	});
});

function loadChats(url,data,outputPlace,showLoader){
	showLoader.show();
	$.post(url,{
		info:data
	},function(data){
		showLoader.hide();
		outputPlace.html(data);
	});
}