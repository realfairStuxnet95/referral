<?php 
include_once 'Query.php';

class Doctor extends Query{

	/*
	WHAT CAN REALLY A DOCTOR DO
	1.create outgoing referrals or counter-referrals.
	2.edit outgoing referrals or counter-referrals.
	3.delete outgoing referrals or counter-referrals.
	4.receive incoming referrals and update their status
	5.login to hi/her account
	*/

	public function validate_doctor($email,$password){
		global $con;
		$result=array();
		$state=false;
		$query="SELECT email,password FROM doctors 
		         WHERE email=\"$email\" AND password=\"$password\" LIMIT 1";
		$num=$this->rows($con,$query);
		if($num==1){
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			if(($value['email']==$email) && ($value['password']==$password)){
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

	//function to get doctor hospital id
	public function get_doctor_hospital_id($user_id){
		global $con;
		$result=array();
		$hospital=0;
		$query="SELECT hospital_id FROM doctors WHERE doctor_id='$user_id' LIMIT 1";
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$hospital=$value['hospital_id'];
		}
		return $hospital;
	}
	//function to check if username exits
	public function check_user_name($email){
		global $con;
		$query="SELECT email FROM doctors WHERE email=\"$email\" LIMIT 1";
		$num=$this->rows($con,$query);
		$state=false;
		if($num==1){
			$state=true;
		}else{
			$state=false;
		}
		return $state;
	}
	public function sessions($email,$password){
		global $con;
		$result=array();
		$query="SELECT * FROM doctors 
		         WHERE email=\"$email\" AND password=\"$password\" LIMIT 1";
		$result=$this->select($con,$query);
		return $result;
	}

	public function check_id($doctor_id){
		global $con;
		$state=false;
		$query="SELECT doctor_id FROM doctors WHERE doctor_id=\"$doctor_id\"";
		$num=$this->rows($con,$query);
		if($num>0){
			$state=true;
		}else{
			$state=false;
		}
		return $state;
	}

	//function to update user profile
	public function setProfile($doctor_id,$image_url){
		global $con;
		$query="UPDATE doctors SET profile_image=\"$image_url\" WHERE doctor_id=\"$doctor_id\"";
		$status=$this->update($con,$query);
		return $status;
	}

	//function to get doctor profile
	public function getProfile($doctor_id){
		global $con;
		$profile="";
		$query="SELECT profile_image FROM doctors WHERE doctor_id=\"$doctor_id\"";
		$num=$this->rows($con,$query);
		if($num>0){
			$result=array();
			$result=$this->select($con,$query);
			foreach ($result as $key => $value) {
				if($value['profile_image']==="null"){
					$profile="assets/img/avatars/user.png";
				}else{
				$profile='system_images/profiles/'.$value['profile_image'];	
				}	
			}
		}else{
			$profile="assets/img/avatars/user.png";
		}
		return $profile;
	}
	###################################### REFERRAL BASED INFORMATION

	//function to get hospital name
	public function get_hospital($doctor_id){
		global $con;
		$query="SELECT * FROM doctors WHERE doctor_id='$doctor_id'";
		$result=array();
		$hospital_info=array();
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$hospital_id=$value['hospital_id'];
			//get hospital information
			$query1="SELECT * FROM hospitals WHERE hospital_id=\"$hospital_id\"";
			$hospital_info=$this->select($con,$query1);
		}
		return $hospital_info;
	}

	####################################  END OF REFERRAL BASED INFORMATION ################

	################################# DOCTOR PERSONAL PROFILE ##################################
	//function to contain doctor personal profile ADD,EDIT PROFILE
	public function doctor_profile_actions($options,$doctor_id,$names,$email,$password,$phone,$address){
		global $con;
		$query="";
		if($options==1){
			//update doctor profile
			$query="UPDATE doctors SET names=\"$names\",email=\"$email\",
								   password=\"$password\",phone=\"$phone\",
								   address=\"$address\"
								   WHERE doctor_id=\"$doctor_id\"
								   LIMIT 1";
		}
		$status=$this->update($con,$query);

		return $status;
	}
	#####################END OF DOCTOR PERSONAL PROFILE ####################

	##################### GET DOCTOR SESSION PHONE ########################
	public function get_doctor_phone($doctor_id){
		global $con;
		$phone="";
		$query="SELECT phone FROM doctors
				WHERE doctor_id=\"$doctor_id\"
				LIMIT 1";
		$result=array();
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$phone=$value['phone'];
		}

		return $phone;
	}
	###################### END OF GET DOCTOR SESSION PHONE ################
}
//instantiate class Doctor
$doctor=new Doctor();
?>