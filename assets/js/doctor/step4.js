$(document).ready(function(){
	var referral=$("#steps").attr("accesskey");
	$("#referral").val(referral);
	$("#form-file").on("change",function(){
		var files=$(this)[0].files;
		var files_length = $(this)[0].files.length;
		if(files_length>10){
			alert("You can Upload no more than 10 files");
			$(this).val("");
		}else{
		$("#selected").html("You are about to upload "+files_length+" Files").css({
			color:'green'
		});
		$("#has_upload").val("yes");
		}
	});

  $('#uploadForm').on('submit', function(e){  
       e.preventDefault();  
       $.ajax({  
            url: "step4",  
            type: "POST",  
            data: new FormData(this),  
            contentType: false,  
            processData:false,  
            success: function(data)  
            { 
            	if(data.match("200")){
					(function(modal){ modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>Referral Saved successfully Waiting for Status Changes.<br/><img class=\'uk-margin-top\' src=assets/img/loader/loader.gif style=\width:100px\ alt=\'\'>'); setTimeout(function(){
					 modal.hide()
					 window.location="dashboard?action=outgoing_referrals&success";
					}, 5000) })();
            	}else{
            		display_errors(data);
            	}
            }  
       });  
  }); 
});

function display_errors(error){
    UIkit.modal.alert(error);
}