<?php 
include_once 'Query.php';
class System extends Query{

	//function to get systm login title
	public function login_title(){
		global $con;

		$info=array();
		$query="SELECT * FROM system WHERE 1";
		$info=$this->select($con,$query);

		return $info;
	}

	public function get_system(){
		global $con;

		$info=array();
		$query="SELECT * FROM system WHERE 1";
		$info=$this->select($con,$query);

		return $info;
	}
	//function to save system settings
	public function save_system($name,$title,$address,$phone,$system_email,$description){
		global $con;
		$query="UPDATE system SET name=\"$name\",title=\"$title\",address=\"$address\",
			    phone=\"$phone\",system_email=\"$system_email\",description=\"$description\"";
		$status=$this->update($con,$query);
		return $status;
	}
}
//instantiate sytem class
$system=new System();
?>