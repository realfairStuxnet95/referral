$(function(){

	$("#frm_register").submit(function(e){
		e.preventDefault();
		//capture data from form
		var hospital_name=$("#hospital_name").val();
		var hospital_region=$("#hospital_region").val();
		var hospital_category=$("#hospital_category").val();
		var director_names=$("#director_names").val();
		var phone=$("#phone").val();
		var email=$("#email").val();
		var director_password=$("#director_password").val();
		var confirm_password=$("#confirm_password").val();
		var error=$("#errors").val();
		//validate user's inputs
		if(hospital_name.length>=3){
			//validate string
			if(validate_string(hospital_name)){
				if(hospital_region.length>=0){
					if(director_names.length>=5){
						if(validate_string(director_names)){
							if(phone.length>=10){
								if(check_phone(phone)){
									if(ValidateEmail(email)){
										if(director_password.length>=6){
											if(validate_string(director_password)){
												if(confirmPassword(director_password,confirm_password)){
													//register account
var modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>Please wait while we are registering Hospital...<br/><img class=\'uk-margin-top\' src=assets/img/loader/loader.gif style=\width:100px\ alt=\'\'>');
					$.post("save",{
						hospital_name:hospital_name,
						hospital_region:hospital_region,
						hospital_category:hospital_category,
						director_names:director_names,
						phone:phone,
						email:email,
						director_password:director_password
					},function(data){
						modal.hide();
						
						if(data=="1"){
							//alert(data);
							window.location="finish";
						}
					});
												}else{
													display_errors("Passwords do not match");
												}
											}else{
												display_errors("Password must contain number and Letters only");
											}
										}else{
											display_errors("Password must be atleast 6 characters.");
										}
									}else{
										display_errors("Invalid email added");
									}
								}else{
									display_errors("Invalid phone use this format :+250XXXXXXX");
								}
							}else{
								display_errors("Invalid phone number Added.");
							}
						}else{
							display_errors("Director' s Names must include only Letters or Number");
						}
					}else{
						display_errors("Director' s Names must be atleast 5 characters");
					}
				}else{
					display_errors("Please select Location");
				}
			}else{
				display_errors("Hospital name must include only Letters or Number");
			}
		}else{
			display_errors("Hospital name must be atleast 3 characters");
		}
	});
});


function ValidateEmail(mail) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
  {
    return (true)
  }else{
  	 return (false)
  }
   
}

function validate_string(data){
	var state=false;
	mystring = data;
validRegEx = /^[^\\\/&]*$/
if(mystring.match(validRegEx)){
	state=true;
}else{
	state=false;
}
return state;
}

function confirmPassword(pass,cpass){
	var state=false;
	if(pass.match(cpass)){
		state=true;
	}else{
		state=false;
	}
	return state;
}
function check_phone(str){
	var patt = new RegExp(/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im);
  return patt.test(str);
}
function display_errors(error){
	UIkit.modal.alert(error);
}