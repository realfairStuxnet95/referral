<?php 
sleep(2);
$data=$_POST['info'];
if(is_array($data)){
	require_once '../../../includes/database.inc.php';
	include_once '../../../includes/Functions.php';
	include_once '../../../controllers/SuperAdmin.php';
	$error="";
	$success="1";
	$fail="0";
	//grab array data
	$action=$data[0];
	if($action=="save_blog"){
		$title=$function->sanitize($data[1]);
		$category=$function->sanitize($data[2]);
		$description=$function->sanitize($data[3]);
		$tags=$data[4];
		$embed=$function->sanitize($data[5]);

		if(strlen($title)>=5 && strlen($category)>=3 && strlen($description)>=10){
			//save blog post now
		$table="system_blog";
		$id_field="blog_id";
		$blog_id=$super->create_id($table,$id_field);
		$save_status=$super->blog_actions(1,$blog_id,$title,$category,$description,$tags,$embed,"PENDING");
		if($save_status){
			echo "1";
		}else{
			die(mysqli_error($con));
		}
		}else{
			echo "Please check submitted data and try again";
		}
	}elseif($action=="remove_blog"){
		$blog_id=$data[1];
		$delete_status=$super->blog_actions(2,$blog_id,0,0,0,0,0,"PENDING");
		if($delete_status){
			echo $success;
		}else{
			echo $fail;
		}
	}
}else{
	echo "no";
}
?>