$(function(){
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
    };
    reader.readAsDataURL(file);
	  }

	});

	//form submitted
	$("#frm_finish").submit(function(e){
		e.preventDefault();
    //validate data
    var user_mail=$("#user_mail").val();
    var user_phone=$("#user_phone").val();
    if(ValidateEmail(user_mail)){
      if(check_phone(user_phone)){
        $("#loader").show();
        $("#btnFinish").hide();
           $.ajax({  
                url:"finish_account",  
                method:"POST",  
                data:new FormData(this),  
                contentType:false,  
                //cache:false,  
                processData:false,  
                success:function(data)  
                { 
                  hideLoader();
                  if(data.match("200")){
                    window.location="dashboard";
                  }else{
                    alert(data);
                  }          
                }  
           });
         }else{
          UIkit.modal.alert("Please check your Phone");
         }
    }else{
      UIkit.modal.alert("Please check your email");
    }

	});
});

function hideLoader(){
  $("#btnFinish").show();
  $("#loader").hide(); 
}
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