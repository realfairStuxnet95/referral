$(document).ready(function(){
	var pendingDiv=$("ul#tabs_1_content li.pendings");
	var scheduleDiv=$("ul#tabs_1_content li.scheduled");
	var receivedDiv=$("ul#tabs_1_content li.received");
	var assignedDiv=$("ul#tabs_1_content li.assigned");
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
			default:
			data[1]='ASSIGNED';
			data[2]=current_user;
			loadData(loadUrl,data,assignedDiv,"Pleaase wait");
		}
	});
});