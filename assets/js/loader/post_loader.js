
function loadData(url,submitData,outputPlace,loaderMsg){
	var modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>'+loaderMsg+'<br/><img class=\'uk-margin-top\' src=assets/img/loader/loader.gif style=\width:100px\ alt=\'\'>');
	$.post(url,{
		info:submitData
	},function(data){
		modal.hide();
		outputPlace.html(data);
	});
}

function ajax_confirm(message,url,submitData,redirectUrl,successMessage){
	UIkit.modal.confirm(message, function(){ 
var modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>Please wait...<br/><img class=\'uk-margin-top\' src=assets/img/loader/loader.gif style=\width:100px\ alt=\'\'>');
		//send delete request
		$.post(url,{
			info:submitData
		},function(data){
			modal.hide();
			if(data.match("1")){
				alert(successMessage);
				window.location=redirectUrl;
			}else{
				alert(data);
			}
		});
	});
}