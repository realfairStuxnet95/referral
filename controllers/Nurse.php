<?php 
include_once 'Query.php';

class Nurse extends Query{

	/*
	WHAT CAN REALLY A NURSE DO
	1.receive incoming referrals.
	2.create an outgoing referral with doctor approval before being sent.
	3.cannot delete or edit referrals.
	*/
	########################## USER AUTHENTICATIONS ######################################
	public function validate_nurse($email,$password){
		global $con;
		$result=array();
		$state=false;
		$query="SELECT email,password FROM nurses 
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

	public function sessions($email,$password){
		global $con;
		$result=array();
		$query="SELECT * FROM nurses 
		         WHERE email=\"$email\" 
		         AND password=\"$password\" LIMIT 1";
		$result=$this->select($con,$query);
		return $result;
	}

	//update logged in status
	public function isOnline($nurse_id,$status){
		global $con;
		$query="UPDATE nurses SET isOnline=\"$status\"
				WHERE nurse_id=\"$nurse_id\"
				LIMIT 1";
		$status=$this->update($con,$query);

		return $status;
	}
	####################### END OF USER AUTHENTICATIONS ######################################
	############################ PERSONAL PROFILE ############################################

	//function to update,personal profile
	public function personal_profile_actions($option,$nurse_id,$names,$email,$password,$phone,$address,$profile_image){
		global $con;
		$query="";
		if($option==1){
			//update profile
			$query="UPDATE nurses SET names=\"$names\",email=\"$email\",
								   password=\"$password\",phone=\"$phone\",
								   address=\"$address\"
								   WHERE nurse_id=\"$nurse_id\"
								   LIMIT 1";
		}elseif($option==2){
			//update profile image
			$query="UPDATE nurses SET profile_image=\"$profile_image\"
								  WHERE nurse_id=\"$nurse_id\"
								  LIMIT 1";
		}

		$status=$this->update($con,$query);

		return $status;
	}
	############################ END OF PERSONAL PROFILE #####################################
}
//instantiate class Doctor
$nurse=new Nurse();
?>