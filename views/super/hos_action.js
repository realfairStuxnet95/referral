$("a.edit").click(function(){
		var hospital_id=$(this).attr("action");
		var hospital_status=$(this).attr("status");
		var message;
		if(hospital_status.match("PENDING")){
			message="Are you sure you want to Activate this Hospital";
			hospital_status="ACTIVATED";
		}else if(hospital_status.match("ACTIVATED")){
			message="Are you sure you want to Suspend this Hospital";
			hospital_status="PENDING";
		}

		UIkit.modal.confirm(message, function(){ 
			
			//send delete request
			$.post("update_hospital",{
				hospital_id:hospital_id,
				hospital_status:hospital_status
			},function(data){
				
				if(data.match("1")){

					alert("Succeessfully Updated");
					window.location="dashboard";
				}else{
					alert("Something went wrong contact your system administrator!");
				}
			});
		});
	});
	$("a.delete").click(function(){
		var hospital_id=$(this).attr("action");

		UIkit.modal.confirm('Are you sure You want to delete This Hospital ?', function(){ 
			
			//send delete request
			$.post("remove_hospital",{
				hospital_id:hospital_id
			},function(data){
				if(data.match("1")){
					UIkit.modal.alert("Succeessfully deleted");
					window.location="dashboard";
				}else{
					alert("Something went wrong contact your system administrator!");
				}
			});
		});
	});