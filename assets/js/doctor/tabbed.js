$(document).ready(function(){
	var pendingDiv=$("ul#tabs_4 li.pendings");
	var scheduleDiv=$("ul#tabs_4 li.scheduled");
	var receivedDiv=$("ul#tabs_4 li.received");
	var loadUrl="get_incoming";
	var data=[];
	var initialData="PENDINGS";
	data[0]=initialData;
	loadData(loadUrl,data,pendingDiv,"Pleaase wait");
	//tab click
	$("a.tabbed").click(function(){
		var text=$(this).text();
		switch(text){
			case 'PENDINGS':
				data[0]=text;
				loadData(loadUrl,data,pendingDiv,"Pleaase wait");
			break;
			case 'SCHEDULED':
				data[0]=text;
				loadData(loadUrl,data,scheduleDiv,"Pleaase wait");
			break;
			case 'RECEIVED':
				data[0]=text;
				loadData(loadUrl,data,receivedDiv,"Pleaase wait");
			break;
		}
	});
});