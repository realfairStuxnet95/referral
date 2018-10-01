<?php 
include_once 'Query.php';
class Information extends Query{

	//function to get hospital categories
	public function get_hospital_categories(){
		global $con;
		$categories=array();
		$query="SELECT * FROM hospitals_category
				WHERE status!='DELETED'";
		$categories=$this->select($con,$query);
		return $categories;
	}

	//function to get users category
}
//instantiate Information class
$information=new Information();
?>