 <?php
 if($_FILES['file']['name'] != '')  
 { 
 	  $tmp=explode(".", $_FILES['file']['name']);
      $extension = end($tmp);  
      $allowed_type = array("jpg", "jpeg", "png", "gif","PNG");  
      if(in_array($extension, $allowed_type))  
      {
        include_once 'module_loader.php';
      	   //EXTRACT OTHER DATA FROM FORM
      	   $user_mail=$function->sanitize($_POST['user_mail']);
      	   $user_phone=$function->sanitize($_POST['user_phone']);
      	   $user_data=$function->sanitize($_POST['user_data']);
           $new_name = rand() . "." . $extension;
           $path = "system_images/profiles/hospital_admin/" . $new_name;
           $phone_status=$function->validate_phone($user_phone);
           $mail_status=$function->isValidEmail($user_mail);
            if($mail_status==true){
            //check if user is already registered
            $user_state=$user->check_id($user_data);
            //if user is registered
            if($user_state){
              //upload profile and them save information to database
             if(move_uploaded_file($_FILES['file']['tmp_name'], $path))  
             {  
               //save data into database
              $state=$user->finish_hospital_admin($user_data,$user_mail,$user_phone,$path);
              if($state){
                session_start();
                //start a new session for getting a user into the dashboard
                $_SESSION['user_id']=$user_data;
                $_SESSION['user_type']=$user->get_user_type($user_data);
                $_SESSION['names']=$user->get_user_names($user_data);
                echo "200";
              }else{
                die(mysqli_error($con));
              }
             }else{
              echo "error while Uploading image Please contact system Administrators";
             } 
            }else{
              echo "not registered";
            }
            }else{
              echo "please2";
            }
      }  
      else  
      {  
           echo '<script>alert("Invalid File Formate")</script>';  
      }  
 }  
 else  
 {  
      echo '<script>alert("Please Select File")</script>';  
 }  
 ?>