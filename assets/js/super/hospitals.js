$(document).ready(function(){
	var requestUrl="hospital_search";
	var data=[];
	var output=$("#outputDiv");
	var loaderMsg="please wait...";
	var actionUrl="hospital_actions";
	$("#btn_hopitals_export").click(function(){
		window.print();
	});
	$("#select_ref_status").change(function(){
		var input=$(this).val();
		data[0]="get_referrals";
		data[1]=2;
		data[2]=input;
		loadData(requestUrl,data,output,loaderMsg);
	});
	$("#select_ref_hos").change(function(){
		var input=$(this).val();
		data[0]="get_referrals";
		data[1]=3;
		data[2]=input;
		loadData(requestUrl,data,output,loaderMsg);
	});
	$("#select_hospitals").change(function(){
		var input=$(this).val();
		data[0]="by_category";
		data[1]=input;
		//alert(data[1]);
		loadData(requestUrl,data,output,loaderMsg);
	});
	$("#select_status").change(function(){
		var input=$(this).val();
		data[0]="by_status";
		data[1]=input;
		loadData(requestUrl,data,output,loaderMsg);
	});

	$("#txt_search").keydown(function(e){
		if(e.keyCode === 13){
			loadData(requestUrl,data,output,loaderMsg);
		}else{
		var input=this.value;
		data[0]="by_search";
		data[1]=input;
		}
	});
	$("a.search").click(function(){
		var input=$("#txt_search").val();
		if(input.length>0){
			data[0]="by_search";
			data[1]=input;
			loadData(requestUrl,data,output,loaderMsg);
		}else{
			alert("Search something please");
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
		var redirectUrl="dashboard?action=hospitals";
		ajax_confirm(message,actionUrl,data,redirectUrl,successMessage);
	});
});