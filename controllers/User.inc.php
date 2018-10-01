<?php 
include_once 'Query.php';
class User extends Query{

	//admin login info
	public function user_session($username,$password){
		global $con;
		$result=array();
		$query="SELECT * FROM system_users WHERE user_mail='$username' AND user_password='$password' LIMIT 1";
		$result=$this->select($con,$query);
		return $result;
	}
	//function to check if username exits
	public function check_user_name($user_mail){
		global $con;
		$query="SELECT user_mail FROM system_users WHERE user_mail='$user_mail' LIMIT 1";
		$num=$this->rows($con,$query);
		$state=false;
		if($num==1){
			$state=true;
		}else{
			$state=false;
		}
		return $state;
	}
	//function get user hospital
	public function get_user_hospital_id($user_id){
		global $con;
		$result=array();
		$hospital=0;
		$query="SELECT hospital_id FROM system_users WHERE user_id='$user_id' LIMIT 1";
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$hospital=$value['hospital_id'];
		}
		return $hospital;
	}
	//function to save user information into database
	public function save_information(){

	}

	//function to create new user id
	public function create_user_id(){
		global $con;
		$query=mysqli_query($con,"SELECT user_id FROM system_users ORDER BY user_id DESC LIMIT 1");
		$result=mysqli_fetch_assoc($query);
		$id=$result['user_id'];
		settype($id, 'integer');
		$id=$id+1;

		return $id;//return new create id
	}
	//function to check if user id is not already registered
	public function check_id($user_id){
		global $con;
		$state=false;
		$query="SELECT user_id FROM system_users WHERE user_id='$user_id'";
		$num=$this->rows($con,$query);
		if($num>0){
			$state=true;
		}else{
			$state=false;
		}
		return $state;
	}

	//function to return hashed password
	public function hash_password($password){
		$new_pass=md5($password);
		return $new_pass;
	}

	//function to validate returned data from database
	public function validate_user($username,$password){
		global $con;
		$result=array();
		$state=false;
		$password=md5($password);
		$query="SELECT user_mail,user_password FROM system_users WHERE user_mail='$username' AND user_password='$password' LIMIT 1";
		$num=$this->rows($con,$query);
		if($num==1){
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			if(($value['user_mail']==$username) && ($value['user_password']==$password)){
				$state=true;
			}else{
				$state=false;
			}
		}
		}else{
			$state=false;
		}
	return $state;	
	}
	//function to update user status and turn him/her on
	public function change_status($user_id,$status){
		global $con;
		$query="UPDATE system_users SET is_logged_in='$status' WHERE user_id='$user_id' LIMIT 1";
		$state=$this->update($con,$query);
		return $state;
	}

	//function to update user informations (names and passwords)
	public function update_user($user_id,$names,$user_password){
		global $con;
		$password=md5($user_password);

		$query="UPDATE system_users SET Names=\"$names\",user_password=\"$password\"
				WHERE user_id=\"$user_id\"";
		$status=$this->update($con,$query);
		return $status;
	}
	######SAVE USER DATA##########################
	//function to hospital admin info at registering account for hospital
	public function save_hospital_admin($user_id,$user_password,$user_names,$hospital_id){
		global $con;
		//hash hospital admin password
		$state=false;
		$password=md5($user_password);
		$user_type="HospitalAdmin";
		 $query="INSERT INTO system_users(user_id,Names,user_password,category,hospital_id,status,is_logged_in)
		 VALUES (\"$user_id\", \"$user_names\", \"$password\", \"$user_type\", \"$hospital_id\", \"PENDING\", 'NO')";
		 $state=$this->insert($con,$query);
		 return $state;
	}

	//function to finish setting hospital admin 
	public function finish_hospital_admin($user_id,$user_mail,$user_phone,$user_profile){
		global $con;
		$query="UPDATE system_users SET user_mail=\"$user_mail\",
				user_phone=\"$user_phone\",user_profile=\"$user_profile\"
				 WHERE user_id=\"$user_id\"";
		$state=$this->update($con,$query);
		return $state;
	}

	//function to get user type
	public function get_user_type($user_id){
		global $con;
		$type=array();
		$category;
		$query="SELECT category FROM system_users WHERE user_id='$user_id'";
		$type=$this->select($con,$query);
		foreach ($type as $key => $value) {
			$category=$value['category'];
		}

		return $category;
	}
	//function to get user names
	public function get_user_names($user_id){
		global $con;
		$type=array();
		$names;
		$query="SELECT Names FROM system_users WHERE user_id='$user_id'";
		$type=$this->select($con,$query);
		foreach ($type as $key => $value) {
			$names=$value['Names'];
		}

		return $names;
	}
	//function to get user data
	public function get_user($user_id){
		global $con;
		$query="SELECT * FROM system_users WHERE user_id='$user_id' LIMIT 1";
		$data=array();
		$data=$this->select($con,$query);
		return $data;
	}
################################ USER AUTHENTICATION SECTION ###############################################
	public function validateUsers($username,$password){
		global $con;
		$num=0;
		$query="";
		$response="";
		$password=md5($password);
				//not a doctor
				$query="SELECT email,password FROM doctors 
		         			   WHERE email=\"$username\" AND 
		         			   password=\"$password\" LIMIT 1";
		        $num=$this->rows($con,$query);
		        if($num==0){
		        	//not a doctor
				$query="SELECT email,password FROM nurses 
		         			   WHERE email=\"$username\" AND 
		         			   password=\"$password\" LIMIT 1";
		        $num=$this->rows($con,$query);
		        if($num==0){
		        	//not a nurse
				$query="SELECT email,password FROM receptionists 
		         			   WHERE email=\"$username\" AND 
		         			   password=\"$password\" LIMIT 1";
		        $num=$this->rows($con,$query);
		        if($num==0){
		        	//not a receptionist
				$query="SELECT * FROM system_users
						WHERE user_mail=\"$username\"
						AND user_password=\"$password\"
						LIMIT 1";

		        $num=$this->rows($con,$query);
		        if($num==0){
		        	//not a hospitalAdmin
				$query="SELECT * FROM superadmins
						WHERE Access_name=\"$username\"
						AND Super_key=\"$password\"
						LIMIT 1";
				$num=$this->rows($con,$query);
				if($num==0){
					$response="500";
				}else{
					$response="superadmins";
				}
		        }else{
		        	$response="system_users";	
		        }
		        }else{
		        	$response="receptionists";
		        }
		        }else{
		        	$response="nurses";
		        }
		        }else{
		        	$response="doctors";
		        }

		return $response;
	}

	public function userLogin($table,$username,$password){
		global $con;
		$state=false;
		$name_field="";
		$pass_field="";
		$result=array();
		$password=md5($password);
	    $allowed=array("superadmins","doctors","nurses","receptionists","system_users");
	    $query="";
	    if(in_array($table,$allowed)){
	        switch ($table) {
	        	case 'superadmins':
	        		$name_field="Access_name";
	        		$pass_field="Super_key";
					$query="SELECT * FROM superadmins
						    WHERE Access_name=\"$username\" 
						    AND Super_key=\"$password\"
						    LIMIT 1";
	        		break;
	        	case 'doctors':
	        		$name_field="email";
	        		$pass_field="password";
	        		$query="SELECT * FROM doctors 
		         			WHERE email=\"$username\" 
		         			AND password=\"$password\"
		         			LIMIT 1";
	        		break;
	        	case 'nurses':
	        		$name_field="email";
	        		$pass_field="password";
	        		$query="SELECT * FROM nurses 
		         			WHERE email=\"$username\" 
		         			AND password=\"$password\"
		         			LIMIT 1";
	        		break;
	        	case 'receptionists':
	        		$name_field="email";
	        		$pass_field="password";
	        		$query="SELECT * FROM receptionists 
		         			WHERE email=\"$username\" 
		         			AND password=\"$password\"
		         			LIMIT 1";
	        		break;
	        	case 'system_users':
	        		$name_field="user_mail";
	        		$pass_field="user_password";
	        		$query="SELECT * FROM system_users
	        				WHERE user_mail=\"$username\"
	        				AND user_password=\"$password\"
	        				LIMIT 1";
	        		break;
	        }
	        
	        $result=$this->select($con,$query);
	    }else{
	        $result[0]="500";
	    }

	    return $result;
	}
##################### END OF USER AUTHENTICATION SECTION ###############################

##################### GENERAL USER INFORMATION ##################################
	public function get_user_information($user_id,$user_type){
		global $con;
		$query="";
		$result=array();
		$allowed=array("SuperAdmin","HospitalAdmin","doctor","nurse","receptionist");
		if(in_array($user_type, $allowed)){
			switch ($user_type) {
				case 'SuperAdmin':
					$query="SELECT * FROM superadmins 
							WHERE Super_id=\"$user_id\"
							LIMIT 1";
					break;
				case 'HospitalAdmin':
					$query="SELECT * FROM system_users
							WHERE user_id=\"$user_id\"
							LIMIT 1";
					break;
				case 'doctor':
					$query="SELECT * FROM doctors
							WHERE doctor_id=\"$user_id\"
							LIMIT 1";
					break;
				case 'nurse':
					$query="SELECT * FROM nurses
							WHERE nurse_id=\"$user_id\"
							LIMIT 1";
					break;
				case 'receptionist':
					$query="SELECT * FROM receptionists
							WHERE receptionist_id=\"$user_id\"
							LIMIT 1";
					break;
			}
			$result=$this->select($con,$query);
		}else{
			$result[0]="error";
		}

		return $result;
	}
################## END OF GENERAL USER INFORMATION ############################
}
//instantiate class User
$user=new User();
?>