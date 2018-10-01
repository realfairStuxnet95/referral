$(function(){

	$("#file").on("change",function(){
		var file=document.getElementById("file").files[0];
		var name = document.getElementById("file").files[0].name;
		var ext = name.split('.').pop().toLowerCase();
	  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
	  {
      $("#file").val("");
	 display_errors("Invalid Image File");
	  }else{
	  var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('profile');
      output.src = dataURL;
      //upload image now
      var form_data = new FormData();
      form_data.append("file", document.getElementById('file').files[0]);
      form_data.append("user_id", $("#user_id").html());
      form_data.append("user_type", $("#user_type").html());
   $.ajax({
    url:"upload_profile",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     display_errors("Uploading image..........");
    },   
    success:function(data)
    {
     display_errors(data);
    }
   });

    };
    reader.readAsDataURL(file);
	  }

	});

	//update btn submite
	$("#btn_update").click(function(){
		var user_names=$("#user_names").val();
		var user_password=$("#user_password").val();
		var confirm_password=$("#confirm_password").val();

		if(user_names.length>=3){
			if(user_password.length>=6){
				if(confirmPassword(user_password,confirm_password)){
					
					$.post("update_hospital_admin",{
						user_names:user_names,
						user_password:user_password
					},function(data){
						display_errors(data);
					});
				}else{
					display_errors("Entered Password do not match");
				}
			}else{
				display_errors("Please Password must be 6 characters Minimum");
			}
		}else{
			display_errors("Please Enter valid names");
		}
	});
});
function display_errors(error){
	UIkit.modal.alert(error);
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