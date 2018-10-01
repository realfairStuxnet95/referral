$(document).ready(function(){
	var requestUrl="remove_referral";
	var redirectUrl="dashboard?action=outgoing_referrals";
	var message="Are you sure you want to delete this";
	$("a.delete").click(function(){
		var action=$(this).attr("action");
			UIkit.modal.confirm(message, function(){
					var modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>Please wait......<br/><img class=\'uk-margin-top\' src=assets/img/loader/loader.gif style=\width:100px\ alt=\'\'>');
			$.post(requestUrl,{
				referral:action
			},function(data){
				modal.hide();
				//alert(data);
				if(data.match("1")){
					alert("Successfully deleted");
					window.location=redirectUrl;
				}else if(data.match("0")){
					alert("System Error Please Contact your System Administrator");	
				}else{
					alert(data);
				}
			});
			});
	});
});