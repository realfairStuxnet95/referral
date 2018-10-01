$(document).ready(function(){
	var input;
	var requestUrl="counter_search";
	var data=[];
	var output=$("ul#tabs_4 li.pendings");
	var loaderMsg="please wait...";


	$("#txt_search").keydown(function(e){
		if(e.keyCode === 13){
			loadData(requestUrl,data,output,loaderMsg);
		}else{
		input=this.value;
		data[0]=input;
		}
	});
	$("a.search").click(function(){
		var input=$("#txt_search").val();
		if(input.length>0){
			data[0]=input;
			loadData(requestUrl,data,output,loaderMsg);
		}else{
			alert("Search something please");
		}
	});
});