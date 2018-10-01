$(document).ready(function(){
	var incomingDiv=$("ul#tabs_4 li.pendings");
	var outgoingDiv=$("ul#tabs_4 li.scheduled");
	var loadUrl="get_counter_referral";
	var data=[];
	var initialData="INCOMING";
	data[0]=initialData;
	loadData(loadUrl,data,incomingDiv,"Pleaase wait");
	//tab click
	$("a.tabbed").click(function(){
		var text=$(this).attr("status");
		switch(text){
			case 'INCOMING':
				data[0]=text;
				loadData(loadUrl,data,incomingDiv,"Pleaase wait");
			break;
			case 'OUTGOING':
				data[0]=text;
				loadData(loadUrl,data,outgoingDiv,"Pleaase wait");
			break;
		}
	});
});