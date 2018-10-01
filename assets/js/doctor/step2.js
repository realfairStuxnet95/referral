$(document).ready(function(){
    var key=$("#steps").attr("accesskey");
    var step=$("#steps").attr("step");
    if(step=="1"){
        $("#card_loader").load("referral/step1.php");
    }

	$("#btn_get_info").on("click",function(){
		//get value from input
		var to_hos_name=$("#to_hos_name").val();
		if(to_hos_name.length>0){
			//send request to get all hospital information
			$.post("hospital_info",{
				hospital:to_hos_name
			},function(data){

				$("#div_hospital").html(data);
			});
		}else{
			display_errors("Please Enter Hospital names");
		}
	});
	$("#btn_info").click(function(){
		UIkit.modal('#modal_overflow').toggle();
		$("#div_hospital1").html($("#div_hospital").html());
	});
	$("#btn_save").on('click',function(){
		//validate data and insert them into database
		var hospital_name=$("#hospital_name").val();
		var physician_name=$("#physician_name").val();
		var physician_phone=$("#physician_phone").val();
		var transportation=$("#transportation").val();
		var to_hos_name=$("#to_hos_name").val();
		var department=$("#department").val();
		var to_hospital_id=$("#to_hospital_id").val();
		var from_hospital_id=$("#from_hospital_id").val();
		var referral=$("#steps").attr("accesskey");
		//validate data
		if(hospital_name.length>=3){
			if(physician_name.length>=3){
				if(check_phone(physician_phone)){
					if(transportation.length>=3){
						if(to_hos_name.length>=3){
							if(department.length>0 && to_hospital_id.length>=1){
								if(from_hospital_id.length>=1){
									//send request now.
									$.post("step2",{
										hospital_name:hospital_name,
										physician_name:physician_name,
										physician_phone:physician_phone,
										transportation:transportation,
										to_hos_name:to_hos_name,
										department:department,
										to_hospital_id:to_hospital_id,
										from_hospital_id:from_hospital_id,
										referral:referral
									},function(data){
										if(data.match("1")){
											$("#card_loader").load("referral/step3.php");
										}
									});
								}else{
									display_errors("System Error Contact Admin as Soon as Possible");
								}
							}else{
								display_errors("Please select Receiver Hospital Information");
							}
						}else{
							display_errors("Invalid To Hospital Names");
						}
					}else{
						display_errors("Please specify Transportation");
					}
				}else{
					display_errors("Invalid Physician Phone");
				}
			}else{
				display_errors("Physician Invalid Name");
			}
		}else{
			display_errors("System errors check administrator");
		}
	});
});

function check_phone(str){
	var patt = new RegExp(/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im);
  return patt.test(str);
}
function display_errors(error){
	UIkit.modal.alert(error);
}
function validate_string(data){
	var state=false;
	mystring = data;
	validRegEx = /^[^\\\/&]*$/
	if(mystring.match(validRegEx)){
		state=true;
	}else{
		state=false;
	}
	return state;
}