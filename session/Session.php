<?php 

class Cookies{

	//function to check session of home if it should be on finish account setting
	public function home_to_finish_acount(){
		$state=false;
	 if((isset($_SESSION['director_id']) && isset($_SESSION['director_name'])) 
	 	&& (!isset($_SESSION['director_phone']) && !isset($_SESSION['director_mail']))){
	 	$state=true;
	 }else{
	 	$state=false;
	 }
	 return $state;
	}
	//function to check hospital admin session on finish account setting
	public function finish_account_to_login(){
		$state=false;
		if(!isset($_SESSION['director_id']) && !isset($_SESSION['director_name'])){
			$state=true;
		}else{
			$state=false;
		}
		return $state;
	}
	//function to sett session from account login to finish account
	public function set_register_session($director_id,$director_name){
		$_SESSION['director_id']=$director_id;
		$_SESSION['director_name']=$director_name;

		return true;
	}
	//function to set session from finish account to dashboard
	public function set_finish_account_session($user_id,$user_type,$names){
		$_SESSION['user_id']=$user_id;
		$_SESSION['user_type']=$user_type;
		$_SESSION['names']=$names;

		return true;
	}

	//FUNCTION STANDARD USER LOGGIN SESSIONS
	public function set_user_session($user_id,$user_type,$names){
		$_SESSION['user_id']=$user_id;
		$_SESSION['user_type']=$user_type;
		$_SESSION['names']=$names;
		return true;
	}
	//get user hospital
	public function get_user_hospital($user_id,$user_type){

	}
}
//instantiate class of Session.
$session=new Cookies();
?>