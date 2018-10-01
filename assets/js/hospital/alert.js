$(document).ready(function(){

	$.get("admin_messages",function(data){
		if(data!="0" && data!="404"){
			showMessage(data);
		}
	});	
});