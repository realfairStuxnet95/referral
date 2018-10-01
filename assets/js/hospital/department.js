$(function(){
	//initialize components
	var data=[];
	var url="department_actions";
	var message="Saving Department";
	var deleteMessage="Do you want to delete this Department";
	var redirectUrl="dashboard?action=departments";
	var successMessage="successfully deleted";
	var name;
	//end of initialization
	$("#frm_reg_dep").submit(function(e){
		e.preventDefault();
		name=$("#name").val();
		var description=$("#description").val();
		var hos_id=$("#hos_id").val();
		if(name.length>=1){
			if(hos_id.length>0){
				//can send ajax request
				$.post("save_department",{
					name:name,
					description:description,
					hos_id:hos_id
				},function(data){
					if(data.match("1")){
						alert("department saved successfully");
						window.location="dashboard?action=departments";
					}else if(data.match("0")){
						error("There was a problem while saving Department");
					}else if(data.match("exist")){
						error("Department you are about to add already exists");
					}else if(data.match("error")){
						error("Please check submitted data");
					}
				});
			}else{
				error("description Must be above 10 characters");
			}
		}else{
			error("Department name must be above 3 characters");
		}
	});
	$("#name").change(function(){
		name=$(this).val();
		
	});

	//department actions
	$("a.delete").click(function(){
		var action=$(this).attr("action");
		data[0]="remove_department";
		data[1]=action;
		//alert(data[1])
		confirmModal(url,data,deleteMessage,successMessage,redirectUrl);
	});
	//end of department actions
});

function error(msg){
	UIkit.modal.alert(msg);
	$("#name").val("");
	$("#description").val("");
}