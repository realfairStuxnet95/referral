<?php
require '../includes/database.inc.php';
include 'Referral.inc.php'; 
if(isset($_POST['submit'])){
	//get the file being uploaded
	$file=$_FILES['file'];
	//get attribute of file uploaded like name,tmp_name,size,type
	$fname=$_FILES['file']['name'];
	$tname=$_FILES['file']['tmp_name'];
	$type=$_FILES['file']['type'];
	$size=$_FILES['file']['size'];
	$error=$_FILES['file']['error'];

	//get extension part of file being uploaded
	$fileExt=explode('.', $fname);
	//get actual extension
	$extension=strtolower(end($fileExt));

	//array containing allowed extensions
	$allowed=array('jpg','png','jpeg','gif','pdf');
	//check if our extension is in our allowed list
	if(in_array($extension,$allowed)){
		//check if there was no error while uploading file
		if($error===0){
			//check file size for limited size file
			#must be below 500mb->500000
			if($size<50000000){
				//now create new file name to remove problem of duplication
				$new_name=uniqid('',true).".".$extension;
				//tell where we want to upload the file
				$destination='uploads/'.$new_name;
				//now upload the file
				if(move_uploaded_file($tname,$destination)){
					//insert data into database
					$attach_id=$referral->create_attachment_id();
					$save_status=$referral->save_referral_files($attach_id,2,$new_name,$type,$size,$error,"PENDING");
					if($save_status){
						echo "uploaded successfully";
					}else{
						die(mysqli_error($con));
					}
				}else{
					echo "Something went wrong please contact your system admin";
				}
			}else{
				echo "That file is too large please check your file and try again later";
			}
		}else{
			echo "There was an error while uploading your file";
		}
	}else{
		echo "You can not upload this type of file";
	}
	//print_r($file);
}
?>