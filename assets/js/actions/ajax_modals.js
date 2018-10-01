function saveModal(url,data,message,redirectUrl){
	var modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>'+message+'<br/><img class=\'uk-margin-top\' src=assets/img/loader/loader.gif style=\width:100px\ alt=\'\'>');
	$.post(url,{
		info:data
	},function(data){
		modal.hide();
		if(data.match("1")){
			window.location=redirectUrl;
		}else if(data.match("0")){
			alert("System error Please contact Your System Developers");
		}else{
			alert(data);
		}
		
	});

}

function confirmModal(url,data,message,successMessage,redirectUrl){
	UIkit.modal.confirm(message, function(){
			var modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>Please wait......<br/><img class=\'uk-margin-top\' src=assets/img/loader/loader.gif style=\width:100px\ alt=\'\'>');
	$.post(url,{
		info:data
	},function(data){
		modal.hide();
		//alert(data);
		if(data.match("1")){
			alert(successMessage);
			window.location=redirectUrl;
		}else if(data.match("0")){
			alert("System Error Please Contact your System Administrator");	
		}else{
			alert(data);
		}
	});
	});
}

function showMessage(htmlDom){
var modal = UIkit.modal.blockUI(htmlDom);
setTimeout(function(){
	modal.hide();
},5000);
}

function errorAlerts(htmlDom,outputDiv,requestUrl,dataRequest){
	UIkit.modal.confirm(htmlDom,function(){
		$.ajax({
			url:requestUrl,
			dataType:jsonData,
			processCache:false,
			data:dataRequest,
			success:function(data){
				outputDiv.html(data);
			}
		});
	});
}