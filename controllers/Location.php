<?php 
include_once 'Query.php';
class Location extends Query{

	//function to get location for registering hospital
	public function get_locations(){
		global $con;
		$location=array();
		$query="SELECT * FROM hospital_regions
				WHERE status!='DELETED'";
		$location=$this->select($con,$query);
		return $location;
	}
}
$location=new Location();
?>