$(function(){
	$("#frm_login").submit(function(e){
		e.preventDefault();
		var username=$("#login_username").val();
		var password=$("#login_password").val();

		if(username.length>=3){
			if(password.length>=3){
				//can show request
				$("#login_loader").show();
				$("#login_errors").hide();
				$.post("login",{
					username:username,
					password:password
				},function(data){
					//alert(data)
					$("#login_loader").hide();
					if(data=="1"){
						window.location="home";
					}else if(data=="0"){
						//alert("user not exists");
						$("#login_errors").show().html("Please check username and password");
					}
				});
			}else{
				$("#login_errors").show().html("Please enter valid password");
			}
		}else{
			alert("Error");
			$("#login_errors").show().html("Please enter valid username");
		}
	});
});

function showErrors(error){
	$("#login_errors").show();
	$("#login_errors").html(error);

}