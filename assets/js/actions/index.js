$(document).ready(function(){
	$("#btn_export_doc").click(function(){
		var content=$("#tb_exportable").html();
		var element=$("#tb_exportable");
		window.print(element);
	});
	$("#hospital_logo").on("change",function(){
	  var file=document.getElementById("hospital_logo").files[0];
	  var name = document.getElementById("hospital_logo").files[0].name;
	  var ext = name.split('.').pop().toLowerCase();
	  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
	  {
	      $("#hospital_logo").val("");
		 display_errors("Invalid Image File");
	  }else{
		  var reader = new FileReader();
	    reader.onload = function(){
	      var dataURL = reader.result;
	      var output = document.getElementById('profile');
	      output.src = dataURL;
	      //upload image now
	      var form_data = new FormData();
	      form_data.append("file", document.getElementById('hospital_logo').files[0]);
	      form_data.append("user_id", current_hospital);
	      form_data.append("user_type", "Hospital");
		   $.ajax({
		    url:"upload_profile",
		    method:"POST",
		    data: form_data,
		    contentType: false,
		    cache: false,
		    processData: false,
		    beforeSend:function(){
		    },   
		    success:function(data)
		    {
		     if(data.match("1")){
		     	location.reload();
		     }else{
		     	display_errors(data);
		     }
		    }
		   });

	    };
	    reader.readAsDataURL(file);
	  }

	});
	//btn remove referral chat comment
});
function display_errors(error){
	UIkit.modal.alert(error);
}
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}