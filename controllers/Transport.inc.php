<?php 
include_once 'Query.php';

class Transport extends Query{

	//function to return all mode of transportation available in system
	public function transport_modes(){
		global $con;
		$query="SELECT * FROM transport_mode WHERE 1";
		$result=array();
		$result=$this->select($con,$query);
		return $result;
	}
}
$transport=new Transport();
?>