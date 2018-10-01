$(document).ready(function(){
	var requestUrl="nurse_receptionist";
	var data=[];
	var output=$("#outputDiv");
	var loaderMsg="please wait...";

	$("a.delete").click(function(){
		var action=$(this).attr("action");
		var table=$(this).attr("target");
		alert(table);
	});

	$("#select_hospitals").change(function(){
		var input=$(this).val();
	data[0]="by_hospital";
	data[1]=$("#table").val();
	data[2]=input;
	//alert(data[1]);
	loadData(requestUrl,data,output,loaderMsg);
	});
	$("#select_status").change(function(){
		var input=$(this).val();
		data[0]="by_status";
		data[1]=$("#table").val();
		data[2]=input;
		//alert(data[0]);
		loadData(requestUrl,data,output,loaderMsg);
	});
	$("#txt_search").keydown(function(e){
		if(e.keyCode === 13){
			loadData(requestUrl,data,output,loaderMsg);
		}else{
		var input=this.value;
		data[0]="by_search";
		data[1]=$("#table").val();
		data[2]=input;
		}
	});
	$("a.search").click(function(){
		var input=$("#txt_search").val();
		if(input.length>0){
			data[0]="by_search";
			data[1]=$("#table").val();
			data[2]=input;
			loadData(requestUrl,data,output,loaderMsg);
		}else{
			alert("Search something please");
		}
	});
});