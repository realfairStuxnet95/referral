$(document).ready(function(){
    //alert();
    var key=$("#steps").attr("accesskey");
    var step=$("#steps").attr("step");
    if(step=="2" && key!="0"){
        $("#card_loader").load("referral/step2.php");
    }

    $("#btn_step1").click(function(){
        //validate data and continue
        //capture inputs
        var fname=$("#fname").val();
        var lname=$("#lname").val();
        var phone=$("#phone").val();
        var dob=$("#dob").val();
        var gender=$("#gender").val();
        var id_no=$("#id_no").val();

        //validate data
        if((fname.length>=3) &&(validate_string(fname))){
           if((lname.length>=3) &&(validate_string(lname))){
                if(dob.length>=2){
                    if(gender.length>0){
                        if(id_no.length>=3){
                            $.post("step1",{
                                patient_fname:fname,
                                patient_lname:lname,
                                patient_id_no:id_no,
                                patient_phone:phone,
                                patient_dob:dob,
                                patient_sex:gender
                            },function(data){
                                //check data
                                if(data!="error"){
                                    //save them into attribute
                                    $("#steps").attr("accesskey",data);
                                    //load step 2;
                                    $("#card_loader").load("referral/step2.php");
                                }
                            });
                        }else{
                            display_errors("Please check ID Number");
                        }
                    }else{
                        display_errors("Select Gender Please");
                    }
                }else{
                    display_errors("Please add Date of Birth");
                }
           }else{
            display_errors("Please enter Last names");
           }
        }else{
            display_errors("Please enter First names");
        }
    });
});