$(function(){
	//form submitted
	$("#frm_login").submit(function(e){
		e.preventDefault();
		var username=$("#login_username").val();
		var password=$("#login_password").val();
		if(username.length>=3){
			if(password.length>=3){
				var modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>Please wait...<br/><img class=\'uk-margin-top\' src=assets/img/loader/loader.gif style=\width:100px\ alt=\'\'>');
				$.post("validate_user",{
					username:username,
					password:password
				},function(data){
					modal.hide();
					if(data.match("200")){
						window.location="dashboard";
						//displayError(data);
					}else if(data.match("500")){
						displayError("Invalid credential Please check Email and password");
					}else{
						displayError(data);
					}
				});
			}else{
				displayError('Please check your password');
			}
		}else{
			displayError("Please enter valid username");
		}
	});
});

function displayError(error){
	UIkit.modal.alert(error);
}