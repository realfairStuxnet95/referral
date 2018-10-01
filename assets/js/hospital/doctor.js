$(function(){
	//action clicks javascript
	var redirectUrl="dashboard?action=doctors";
	var url="delete_doctor";
	var message="Do you want to delete this User";
	var successMessage="Operation successfully done";
	var data=[];
	var actionUrl="doctor_actions";
	//check form that have been submitted
	$("a.delete").click(function(){
		var action=$(this).attr("action");
		data[0]=action;
		//alert(data[0]);
		confirmModal(url,data,message,successMessage,redirectUrl);
	});

	//images file selected
	$("#file").on("change",function(){
		var file=document.getElementById("file").files[0];
		var name = document.getElementById("file").files[0].name;
		var ext = name.split('.').pop().toLowerCase();
	  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
	  {
      $("#file").val("");
	   alert("Invalid Image File");
	  }else{
	  var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('profile');
      output.src = dataURL;
      output.style.display="block";
    };
    reader.readAsDataURL(file);
	  }

	});
	//check form that have been submitted
	$("#frm_reg_doctor").submit(function(e){
		e.preventDefault();
		//grab data from form input fields
		var doctor_names=$("#doctor_names").val();
		var doctor_email=$("#doctor_email").val();
		var doctor_password=$("#doctor_password").val();
		var doctor_phone=$("#doctor_phone").val();
		var doctor_address=$("#doctor_address").val();
		var doctor_department=$("#doctor_department").val();

		//validate user data
		if(doctor_names.length>=5){
			if(ValidateEmail(doctor_email)){
				if(doctor_password.length>=6){
					if(doctor_phone.length>=10){
						if(check_phone(doctor_phone)){
							if(doctor_department.length>=1){
								if(doctor_address.length>=3){
									//information should be sent to server side
var modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>Please wait while we are registering Doctor...<br/><img class=\'uk-margin-top\' src=assets/img/loader/loader.gif style=\width:100px\ alt=\'\'>');
           $.ajax({  
                url:"save_doctor",  
                method:"POST",  
                data:new FormData(this),  
                contentType:false,  
                //cache:false,  
                processData:false,  
                success:function(data)  
                {
                	modal.hide();
                	if(data.match("saved")){
                		window.location="dashboard?action=doctors";
                	}else{
                		errors(data);
                	}
                }  
           });
								}else{
									errors("Invalid address");
								}
							}else{
								errors("Please select department");
							}
						}else{
							errors("Invalid phone added");
						}
					}else{
						errors("Minimum phone number are 10 \n Format:+2507XXXXXXXX");
					}
				}else{
					errors("Doctor password must be above 6 characters");
				}
			}else{
				errors("Doctor email is not valid");
			}
		}else{
			errors("Doctor names are not valid");
		}
	});
	//activate and desactivate
	$("a.edit").click(function(){
		var action=$(this).attr("action");
		var status=$(this).attr("status");
		data[0]="change_status";
		data[1]=action;
		data[2]=status;

		var successMessage="Successfully Updated";
		var message="Do you want to perform this Task....";
		var redirectUrl="dashboard?action=doctors";
		ajax_confirm(message,actionUrl,data,redirectUrl,successMessage);
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