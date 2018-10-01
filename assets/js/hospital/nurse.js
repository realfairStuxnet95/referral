$(function(){
	var redirectUrl="dashboard?action=nurses";
	var url="delete_nurse";
	var message="Do you want to delete this User";
	var successMessage="Operation successfully done";
	var data=[];
	//check form that have been submitted
	$("a.delete").click(function(){
		var action=$(this).attr("action");
		data[0]=action;
		confirmModal(url,data,message,successMessage,redirectUrl);
	});

	//check form that have been submitted
	$("#frm_reg_nurse").submit(function(e){
		e.preventDefault();
		//grab data from form input fields
		var nurse_names=$("#nurse_names").val();
		var nurse_email=$("#nurse_email").val();
		var nurse_password=$("#nurse_password").val();
		var nurse_phone=$("#nurse_phone").val();
		var nurse_address=$("#nurse_address").val();
		//validate user data
		if(nurse_names.length>=5){
			if(ValidateEmail(nurse_email)){
				if(nurse_password.length>=6){
					if(nurse_phone.length>=10){
						if(check_phone(nurse_phone)){
								if(nurse_address.length>=3){
									//information should be sent to server side
var modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>Please wait while we are registering nurse...<br/><img class=\'uk-margin-top\' src=assets/img/loader/loader.gif style=\width:100px\ alt=\'\'>');
           $.ajax({  
                url:"save_nurse",  
                method:"POST",  
                data:new FormData(this),  
                contentType:false,  
                //cache:false,  
                processData:false,  
                success:function(data)  
                {
                	modal.hide();
                	window.location=redirectUrl;
                	if(data.match("1")){
                		window.location=redirectUrl;
                	}else{
                		errors("System error contact your system administrators");
                	}
                }  
           });
								}else{
									errors("Invalid address");
								}
						}else{
							errors("Invalid phone added");
						}
					}else{
						errors("Minimum phone number are 10 \n Format:+2507XXXXXXXX");
					}
				}else{
					errors("nurse password must be above 6 characters");
				}
			}else{
				errors("nurse email is not valid");
			}
		}else{
			errors("nurse names are not valid");
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

function check_phone(str){
  var patt = new RegExp(/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im);
  return patt.test(str);
}

function errors(msg){
	UIkit.modal.alert(msg);
}