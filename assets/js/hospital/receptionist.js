$(function(){
	var redirectUrl="dashboard?action=receptionists";
	var url="delete_receptionist";
	var message="Do you want to delete this User";
	var successMessage="Operation successfully done";
	var data=[];
	//check form that have been submitted
	$("a.delete").click(function(){
		var action=$(this).attr("action");
		data[0]=action;
		
		confirmModal(url,data,message,successMessage,redirectUrl);
	});
	
	$("#frm_reg_rec").submit(function(e){
		e.preventDefault();
		//grab data from form input fields
		var rec_names=$("#rec_names").val();
		var rec_email=$("#rec_email").val();
		var rec_password=$("#rec_password").val();
		var rec_phone=$("#rec_phone").val();
		var rec_address=$("#rec_address").val();
		//validate user data
		if(rec_names.length>=5){
			if(ValidateEmail(rec_email)){
				if(rec_password.length>=6){
					if(rec_phone.length>=10){
						if(check_phone(rec_phone)){
								if(rec_address.length>=3){
									//information should be sent to server side
var modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>Please wait while we are registering receptionist...<br/><img class=\'uk-margin-top\' src=assets/img/loader/loader.gif style=\width:100px\ alt=\'\'>');
           $.ajax({  
                url:"save_rec",  
                method:"POST",  
                data:new FormData(this),  
                contentType:false,  
                //cache:false,  
                processData:false,  
                success:function(data)  
                {
                	modal.hide();
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
					errors("rec password must be above 6 characters");
				}
			}else{
				errors("receptionist email is not valid");
			}
		}else{
			errors("receptionist names are not valid");
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