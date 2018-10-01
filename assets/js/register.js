$(function(){
	$("#frm_register").submit(function(e){
		e.preventDefault();
		var name=$("#name").val();
		var category=$("#category").val();
		var username=$("#username").val();
		var user_password=$("#user_password").val();
		var repeat_password=$("#repeat_password").val();

		//validate user inputs
		if(name.length>=3){
			if(category.length>=3){
				if(username.length>=3){
					if(user_password.length>=6){
						if(user_password==repeat_password){
							$("#reg_loader").show();
							$("#reg_errors").hide();
							$.post("register",{
							name:name,
							category:category,
							username:username,
							user_password:user_password	
							},function(data){
								$("#reg_loader").hide();
								if(data=="1"){
									window.location="home";
								}
							});
						}else{
							showErrors("Password must be the same");
						}
					}else{
						showErrors("Admin password must be atleast 6 characters");
					}
				}else{
					showErrors("Cooperative admin name must be above 3 characters");
				}
			}else{
				showErrors("Please select category");
			}
		}else{
			showErrors("Cooperative name must be atleast 3 characters");
		}
	});
});

function showErrors(error){
	$("#reg_errors").show().html(error);
}