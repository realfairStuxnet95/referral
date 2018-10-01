$(function(){

	//check if added hospital name is not taken
	$("#hospital_name").on("blur",function(){
		var hospital_name=$(this).val();
		url="check_name";
		sendRequest(hospital_name,url,$(this),"Please enter valid name",$("#errors"));
	});
	//check if added hospital phone is not taken
	$("#phone").on("blur",function(){
		var hospital_name=$(this).val();
		url="check_phone";
		sendRequest(hospital_name,url,$(this),"Phone already taken",$("#errors"));
	});
	//check if added hospital email is not taken
	$("#phone").on("blur",function(){
		var hospital_name=$(this).val();
		url="check_email";
		sendRequest(hospital_name,url,$(this),"Email already taken",$("#errors"));
	});
});

//function to send request and check returned result
function sendRequest(input,url,object,message,errors){
$.post(url,{
data:input
},function(data){
	if(data.match("1")){
		object.css("border","1px solid red");
		object.css({
			color:'red'
		});
		object.html(message);
		errors.html("yes errors");
	}else{
		object.css("borderBottom","2px solid #333");
		object.css({
			color:'#333'
		});
		object.html("");
	}
});
}