$(document).ready(function(){
	var pendingDiv=$("ul#tabs_4 li.pendings");
	var scheduleDiv=$("ul#tabs_4 li.scheduled");
	var receivedDiv=$("ul#tabs_4 li.received");
	var loadUrl="get_incoming";
	var data=[];
	data[0]='select';
	data[1]='PENDINGS';
	loadData(loadUrl,data,pendingDiv,"Pleaase wait");
	//tab click
	$("a.tabbed").click(function(){
		var text=$(this).text();
		switch(text){
			case 'PENDINGS':
				data[1]=text;
				loadData(loadUrl,data,pendingDiv,"Pleaase wait");
			break;
			case 'SCHEDULED':
				data[1]=text;
				loadData(loadUrl,data,scheduleDiv,"Pleaase wait");
			break;
			case 'RECEIVED':
				data[1]=text;
				loadData(loadUrl,data,receivedDiv,"Pleaase wait");
			break;
		}
	});
});