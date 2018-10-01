<?php 
include_once 'Query.php';
class Hospital extends Query{

	//function to register a hospital
	public function register(){
		global $con;
		$status=false;

	}

	//function to create new hospital id
	public function create_id(){
		global $con;
		$query=mysqli_query($con,"SELECT hospital_id FROM hospitals ORDER BY hospital_id DESC LIMIT 1");
		$result=mysqli_fetch_assoc($query);
		$id=$result['hospital_id'];
		settype($id, 'integer');
		$id=$id+1;

		return $id;//return new create id
	}

	//function to return information a hospital
	public function get_hospitals(){
		global $con;
		$result=array();
		$query="SELECT * FROM hospitals";
		$result=$this->select($con,$query);

		return $result;
	}
	//function to create new hospital code
	public function create_code(){
		$code=mt_rand(10,100000);

		return $code;
	}
	##########	TEST MY OWN QUERY CLASS ###########################

	########### END OF TEST MY OWN QUERY CLASS ####################

	//function to check if hospital id is not registered
	public function check_id($id){
		global $con;
		settype($id, 'integer');
		$num;
		//query creation
		$query="SELECT hospital_id FROM hospitals WHERE hospital_id='$id'";
		$num=$this->rows($con,$query);
		return $num;
	}
	public function checkHospitalId($id){
		global $con;
		settype($id, 'integer');
		$num;
		//query creation
		$query="SELECT hospital_id FROM hospitals WHERE hospital_id=\"$id\"";
		$num=$this->rows($con,$query);
		$status=false;
		if($num>0){
			$status=true;
		}else{
			$status=false;
		}
		return $status;
	}
	//function to check hospital phone number
	public function check_phone($phone){
		global $con;
		$state=false;
		$query="SELECT phone FROM hospitals WHERE phone='$phone'";
		$num=$this->rows($con,$query);
		if($num>0){
			$state=true;
		}else{
			$state=false;
		}
		return $state;
	}

	//function to check hospital email
	public function check_email($email){
		global $con;
		$state=false;
		$query="SELECT email FROM hospitals WHERE email='$email'";
		$num=$this->rows($con,$query);
		if($num>0){
			$state=true;
		}else{
			$state=false;
		}
		return $state;
	}
	//function to save hospital information
	public function save_hospital($id,$code,$name,$category,$location,$director,$phone,$email,$password){
		global $con;
		$query="INSERT INTO hospitals (hospital_id,hospital_code,hospital_name,location,address,director_name,email,phone,status,category,regDate) 
		VALUES ($id, '$code', '$name', '$location', '$location', '$director', '$email', '$phone', 'PENDING', '$category', CURRENT_TIMESTAMP)";

		$state=$this->insert($con,$query);

		return $state;
	}
	
	//function to check if hospital code is free
	public function check_code($code){
		global $con;
		$state=false;
		$query="SELECT hospital_code FROM hospitals WHERE hospital_code='$code'";
		$num=$this->rows($con,$query);
		if($num>0){
			$state=true;
		}else{
			$state=false;
		}
		return $state;
	}
	//function to check if hospital name is free
	public function check_name($name){
		global $con;
		$state=false;
		$query="SELECT hospital_name FROM hospitals WHERE hospital_name='$name'";
		$num=$this->rows($con,$query);
		if($num>0){
			$state=true;
		}else{
			$state=false;
		}
		return $state;
	}
	//function to get hospital info according to its name
	public function get_hospital($name){
		global $con;
		$result=array();
		$query="SELECT * FROM hospitals WHERE hospital_name='$name'";
		$result=$this->select($con,$query);

		return $result;
	}
	//function to get hospital category
	public function get_hospital_category($category_id){
		global $con;
		$query="SELECT category_name FROM hospitals_category WHERE id=\"$category_id\"";
		$result=array();
		$category="";
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$category=$value['category_name'];
		}

		return $category;
	}

	//function to get hospital departments
	public function get_departments($hospital_id){
		global $con;
		$query="SELECT * FROM department WHERE hospital_id=\"$hospital_id\"";
		$result=array();
		$result=$this->select($con,$query);
		return $result;
	}

	//get user hospital
	public function get_user_hospital($user_id,$user_type){
		global $con;

		$hospital="";
		$query="";
		switch ($user_type) {
			case 'doctor':
				$query="SELECT hospital_id FROM doctors WHERE doctor_id=\"$user_id\"";
				break;
			case 'HospitalAdmin':
				$query="SELECT hospital_id FROM system_users WHERE user_id=\"$user_id\"";
				break;
		}
		if($query!=""){
			$result=array();
			$result=$this->select($con,$query);
			foreach ($result as $key => $value) {
				$hospital=$value['hospital_id'];
			}
		}

		return $hospital;
	}

	//function to get Hospital User profiles
	public function get_user_profile($user_id){

	}
	//function to set hospital logo
	public function setHospitalLogo($hospital_id,$logo_url){
		global $con;
		$query="UPDATE hospitals SET profile_picture=\"$logo_url\" WHERE hospital_id=\"$hospital_id\"";
		$status=$this->update($con,$query);
		return $status;
	}
}
//instantiate class of Hospital
$hospital=new Hospital();
?>