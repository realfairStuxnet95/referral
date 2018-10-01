 <?php
	require_once '../includes/database.inc.php';
	include_once '../controllers/Referral.inc.php';
	include_once '../includes/Functions.php';
$error_counter=0;
 $referral_id=$_POST['referral'];
 if(is_array($_FILES))   
 {  
      foreach ($_FILES['files']['name'] as $name => $value)  
      {  
           $file_name = explode(".", $_FILES['files']['name'][$name]);  
           $allowed_ext = array("jpg", "jpeg", "png", "gif","doc","docx","csv","xlsx");  
           if(in_array($file_name[1], $allowed_ext))  
           {  
                $new_name = md5(rand()) . '.' . $file_name[1];  
                $sourcePath = $_FILES['files']['tmp_name'][$name];

                //get file attributes and validate them
				$type=$_FILES['files']['type'][$name];
				$size=$_FILES['files']['size'][$name];
				$error=$_FILES['files']['error'][$name];

				//check for errors
				if($error===0){
					//check for size 

					//upload now
				$targetPath = "../referral_attachments/".$new_name;
                if(move_uploaded_file($sourcePath, $targetPath))  
                {  
                	//CHECK IF REFERRAL IS SAVED

                	//create new attachment id
                	$attach_id=$referral->create_attachment_id();
                	//save attachment
                	$status=$referral->save_referral_files($attach_id,$referral_id,$new_name,$type,$size,$error,'ACTIVE');
                	if($status){
                		$error_counter=0;
                	}else{
                		$error_counter++;
                	}
                }else{
                	$error_counter=$error_counter+1;
                }
				}else{
					$error_counter=$error_counter+1;
				}  
           }            
      }   
 }else{
 	echo "error";
 }

 echo $error_counter; 
 ?> 