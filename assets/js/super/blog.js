$(document).ready(function(){
	var data=[];
	var url="save_blog";
	var message="Saving Blog";
	var deleteMessage="Do you want to delete this Post";
	var redirectUrl="dashboard?action=system_blog";
	var successMessage="successfully deleted";
	$("#btn_save").click(function(){
		data[0]="save_blog";
		data[1]=$("#blog_title").val();
		data[2]=$("#blog_category").val();
		data[3]=$("#description").val();
		data[4]=$("#blog_tags").val();
		data[5]=$("#blog_embed").val();
		saveModal(url,data,message,redirectUrl);
	});

	$("a.delete").click(function(){
		var action=$(this).attr("action");
		data[0]="remove_blog";
		data[1]=action;
		confirmModal(url,data,deleteMessage,successMessage,redirectUrl);
	});

	//update blog section
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
		}
	});
	$("#frm_update").submit(function(e){
		e.preventDefault();
var modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>Please wait...<br/><img class=\'uk-margin-top\' src=assets/img/loader/loader.gif style=\width:100px\ alt=\'\'>');
           $.ajax({  
                url :"update_blog",  
                method:"POST",  
                data:new FormData(this),  
                contentType:false,  
                processData:false,  
                success:function(data){
                modal.hide(); 
                	if(data.match("1")){
                		alert("Blog Updated successfully");
                		window.location=redirectUrl;
                	}
                }  
           });
	});
});