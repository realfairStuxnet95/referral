$(document).ready(function(){
	var data=[];
	var doctors_url="dashboard?action=doctors";
	var output=$("#div_table");
	var loaderMsg="Please wait......";
	data[0]=0;
	data[1]=0;
	data[2]="*";
	data[3]="";

	$("#select_department").change(function(){
		var deparment=$(this).val();
		//request using id
		
		data[0]=deparment;
		data[1]=0;
		data[2]="sam";
		data[3]="PENDING";
		loadData("search_doctor",data,output,loaderMsg);
	});

	$("#select_hospitals").change(function(){
		var hospital=$(this).val();
		data[0]=0;
		data[1]=hospital;
		data[2]="";
		data[3]="PENDING";
		loadData("search_doctor",data,output,loaderMsg);
	});

	$("#select_status").change(function(){
		var status=$(this).val();
		data[0]=0;
		data[1]=0;
		data[2]="";
		data[3]=status;
		loadData("search_doctor",data,output,loaderMsg);
	});

	//searching
	$("#txt_search").keydown(function(e){
		if(e.keyCode === 13){
			loadData("search_doctor",data,output,loaderMsg);
		}else{
		var input=this.value;
		data[0]=0;
		data[1]=0;
		data[2]=input;
		data[3]="";	
		}
	});
	//end of submi==
	$("a.btn_update").click(function(){
		//capture status and action
		var action=$(this).attr("action");
		var status=$(this).attr("status");
		var message;
		if(status.match("PENDING")){
			message="Are you sure you want to Activate this doctor";
			status="ACTIVATED";
		}else if(status.match("ACTIVATED")){
			message="Are you sure you want to Desactivate this doctor";
			status="PENDING";
		}
		data[0]=action;
		data[1]=status;
		ajax_confirm(message,"update_doctor",data,doctors_url,"Successfully Updated");
	});
	$("a.delete").click(function(){
		var action=$(this).attr("action");
		var message;
		message="Do you want to delete this doctor.No Undone actions available";
		data[0]=action;
	});
});