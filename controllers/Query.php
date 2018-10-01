<?php 

class Query{

	//function to run data
	public function insert($con,$query){
		$state=false;
		$query=mysqli_query($con,$query);
		if($query){
			$state=true;
		}else{
			$state=false;
		}
		return $state;
	}
	//function to run data
	public function update($con,$query){
		$state=false;
		$query=mysqli_query($con,$query);
		if($query){
			$state=true;
		}else{
			$state=false;
		}
		return $state;
	}
	//function to select data
	public function select($con,$query){
		$query=mysqli_query($con,$query);
		$result=array();
		if($query){
			while($data=mysqli_fetch_assoc($query)){
				$result[]=$data;
			}
		}else{
			die(mysqli_error($con));
		}

		return $result;
	}

	//function mywsqli_num_rows returns
	public function rows($con,$query){
		$rows=mysqli_num_rows(mysqli_query($con,$query));
		return $rows;
	}

	//function mysqli_error
	public function error($con){
		die(mysqli_error($con));
	}
}
?>