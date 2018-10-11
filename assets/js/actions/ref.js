$(document).ready(function(){
	var input;
	var requestUrl="outgoing";
	var data=[];
	var output=$("#outputDivPlace");
	var loaderMsg="please wait...";
	var pendingDiv=$("ul#tabs_4 li.pendings");
	$("#select_status").change(function(){
		var input=$(this).val();
		data[0]="select";
		data[1]=1;
		data[2]=input;
		loadData(requestUrl,data,output,loaderMsg);
	});
	$("#txt_search").keydown(function(e){
		if(e.keyCode === 13){
			loadData(requestUrl,data,output,loaderMsg);
		}else{
			input=this.value;
			data[0]="search";
			data[1]=3;
			data[2]=input;
		}
	});
	$("#link_search").click(function(){
		var input=$("#txt_search").val();
		if(input.length>0){
			data[0]="search";
			data[1]=2;
			data[2]=input;
			loadData(requestUrl,data,output,loaderMsg);
		}else{
			alert("Search something please");
		}
	});
	$("#incoming_search").click(function(){
		var input=$("#txt_incoming").val();
		if(input.length>0){
			data[0]="search";
			data[1]=input;
			loadData("get_incoming",data,pendingDiv,loaderMsg);
		}else{
			alert("Search something please");
		}
	});
	$("#txt_incoming").keydown(function(e){
		if(e.keyCode === 13){
			loadData("get_incoming",data,pendingDiv,loaderMsg);
		}else{
			input=this.value;
			data[0]="search";
			data[1]=input;
		}
	});
});