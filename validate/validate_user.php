<?php
$error_message="500";
$system_error="403";
$success_message="200";
if(isset($_POST['username']) && isset($_POST['password'])){
    require '../includes/database.inc.php';
    include '../includes/Functions.php';
    include '../controllers/User.inc.php';
    include '../controllers/SuperAdmin.php';
    include '../controllers/Doctor.php';
    include '../session/Session.php';
    include '../controllers/Nurse.php';
    //sanitize inputs
    $response=array();
    $name_field="";
    $pass_field="";
    $usertype="";
    $id_field="";
    $status=false;
    $username=$function->sanitize($_POST['username']);
    $password=$function->sanitize($_POST['password']);
    $table=$user->validateUsers($username,$password);
    if($table!="500"){
    $response=$user->userLogin($table,$username,$password);
    switch ($table) {
        case 'superadmins':
            $name_field="Access_name";
            $pass_field="Super_key";
            $id_field="Super_id";
            $usertype="SuperAdmin";
            break;
        case 'doctors':
            $name_field="names";
            $pass_field="password";
            $id_field="doctor_id";
            $usertype="doctor";
            break;
        case 'nurses':
            $name_field="names";
            $pass_field="password";
            $id_field="nurse_id";
            $usertype="nurse";
            break;
        case 'receptionists':
            $name_field="names";
            $pass_field="password";
            $id_field="receptionist_id";
            $usertype="receptionist";
            break;
        case 'system_users':
            $name_field="Names";
            $pass_field="user_password";
            $id_field="user_id";
            $usertype="HospitalAdmin";
            break;
    }

    //check if array is not empty
    if(count($response)>0){
        session_start();
        foreach ($response as $key => $value) {
        $se_data=$session->set_user_session($value[$id_field],$usertype,$value[$name_field]);
        }
        echo $success_message;
    }else{
        echo $error_message;
    }
    }else{
        echo $error_message;
    }
}else{
    echo $error_message;
}

function loginUserIn($table,$username,$password){

}
?>