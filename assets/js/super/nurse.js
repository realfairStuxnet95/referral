$(document).ready(function(){
	var requestUrl="nurse_receptionist";
	var data=[];
	var output=$("#outputDiv");
	var loaderMsg="please wait...";

	data[0]="*";
	data[1]="nurses";
	data[2]="";
	loadData(requestUrl,data,output,loaderMsg);
});