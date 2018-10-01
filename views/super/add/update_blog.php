<?php 
 //upload.php  
 $output = '';  
 if(is_array($_FILES))  
 {  
      foreach($_FILES['images']['name'] as $name => $value)  
      {  
           $file_name = explode(".", $_FILES['images']['name'][$name]);  
           $allowed_extension = array("jpg", "jpeg", "png", "gif");  
           if(in_array($file_name[1], $allowed_extension))  
           {  
                $new_name = rand() . '.'. $file_name[1];  
                $sourcePath = $_FILES["images"]["tmp_name"][$name];  
                $targetPath = "../../../system_images/blog/".$new_name;  
                if(move_uploaded_file($sourcePath, $targetPath)){
                	//prepare script to update blog
                	require_once '../../../includes/database.inc.php';
                	include_once '../../../controllers/SuperAdmin.php';

                	$blog_id=$_POST['blog_id'];
                	$blog_title=$_POST['blog_title'];
                	$description=$_POST['description'];
                	$blog_embed=$_POST['blog_embed'];

                	$state=$super->updateBlog($blog_id,$blog_title,$description,$blog_embed,$new_name);
                	if($state){
                		$output="1";
                	}else{
                		$output=mysqli_error($con);
                	}
                	//save into database
                }else{
                	$output="There was an error Please contact System Developers";
                }
           }else{
           	$output="Please Uploaded supported files.";
           }  
      }   
      echo $output;  
 }else{
 	echo "Please Upload Images";
 }  
?>