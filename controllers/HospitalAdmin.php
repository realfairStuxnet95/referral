<?php 
include_once 'Query.php';
class HospitalAdmin extends Query{
	##this class will contain actions that a hospital admin can do such as adding doctors,departments,nurses and receptions
	############# HOSPITALADMIN GENERAL ACTION##################################
	public function get_doctor_names($user_id){
		global $con;
		$query="SELECT names FROM doctors WHERE doctor_id=\"$user_id\" LIMIT 1";
		$names="";
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$names=$value['names'];
		}
		return $names;
	}
	//function to delete different table user according to id field
	public function deleteUser($table,$user_id,$field_name){
		global $con;
		$status="error";
		$query="";
		$allowed=array('doctors','nurses');
		if(in_array($table,$allowed)){
			$query="UPDATE ".$table." SET status='DELETED'
					WHERE ".$field_name."=".$user_id;
			$status=$this->update($con,$query);
		}else{
			$status="error";
		}
		return $status;
	}

	//function to load an active system alert
	public function get_system_alert($user_type){
		global $con;
		$query="SELECT * FROM system_announcements 
				WHERE status='ACTIVE' AND target=\"$user_type\" LIMIT 1";
		$result=array();
		$result=$this->select($con,$query);

		return $result;
	}
	############### END OF GENERAL ACTIONS ########################################

	################ DEPARTMENT SECTION ###########################################
	//department action function to add,update,and delete
	public function department_actions($action,$id){
		global $con;
		$query="";
		$status=false;
		if($action==1){
			//delete action
			$query="UPDATE department SET status='DELETED'
					WHERE department_id=\"$id\"
					LIMIT 1";
		}

		if($query!=""){
			$status=$this->insert($con,$query);
		}else{
			$status=false;
		}

		return $status;
	}
	//function  to get deparment description
	public function get_department_description($name){
		global $con;
		$description="";
		$query="SELECT description FROM system_departments
				WHERE name=\"$name\" LIMIT 1";
		$result=array();
		$result=$this->select($con,$query);
		if(count($result)>0){
			foreach ($result as $key => $value) {
				$description=$value['description'];
			}
		}
		else{
		 	$description='null';
		}

		return $description;
	}
	//function get system deparments
	public function get_system_deparments(){
		global $con;
		$query="SELECT DISTINCT * FROM system_departments 
				WHERE status!='DELETED'
				ORDER BY name ASC";
		$result=array();
		$result=$this->select($con,$query);
		return $result;
	}
	//function to add departments
	public function add_department($id,$hos_id,$name,$description){
		global $con;
		$query="INSERT INTO department(department_id,hospital_id,name,description,status,regDate)
				VALUES ('$id','$hos_id','$name','$description', 'PENDING', CURRENT_TIMESTAMP)";
		$status=$this->insert($con,$query);
		return $status;
	}
	//function to get department info of a hospital
	public function load_department($hos_id){
		global $con;
		$query="SELECT * FROM department 
				WHERE hospital_id=\"$hos_id\"
				AND status!='DELETED' 
				ORDER BY name ASC";
		$result=array();
		$result=$this->select($con,$query);
		return $result;
	}
	//function to get department name
	public function get_department_name($id){
		global $con;
		$department_name="";
		$query="SELECT name FROM system_departments
				WHERE id=\"$id\"
				LIMIT 1";
		$result=array();
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$department_name=$value['name'];
		}

		return $department_name;
	}
	//function to create new department id
	public function create_deparment_id(){
		global $con;
		$result=array();
		$id=0;
		$query="SELECT department_id FROM department 
				ORDER BY department_id DESC 
				limit 1";
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$id=$value['department_id'];
		}
		$id=$id+1;
		return $id;
	}

	//function to check if department name do not exist
	public function check_department($hos_id,$name){
		global $con;
		$state=false;
		$query="SELECT department_id FROM department WHERE name='$name' AND hospital_id='$hos_id' LIMIT 1";
		$num=$this->rows($con,$query);
		if($num==1){
			$state=true;
		}else{
			$state=false;
		}
		return $state;
	}
	######################### END OF DEPARTMENT SESSION ######################

	######################### HOSPITAL SETTINGS SECTION ######################
	//function to get hospital settings
	public function get_hospital_info($hospital_id){
		global $con;
		$query="SELECT * FROM hospitals
				WHERE hospital_id=\"$hospital_id\"
				LIMIT 1";
		$result=array();
		$result=$this->select($con,$query);
		return $result;
	}

	//function to update and edit hospital settings
	public function update_hospital_settings($hospital_id,$hospital_name,$slogan,$address_location,$phone,$email,$description){
		global $con;
		$query="UPDATE hospitals SET hospital_name=\"$hospital_name\",
				slogan=\"$slogan\",address_location=\"$address_location\",
				phone=\"$phone\",email=\"$email\",description=\"$description\"
				WHERE hospital_id=\"$hospital_id\" LIMIT 1";
		$status=$this->update($con,$query);

		return $query;
	}
	######################## END OF HOSPITAL SETTINGS SECTION ################

	####################### DOCTOR SESSSION ##################################
	//function to create new doctor id
	public function create_doctor_id(){
		global $con;
		$query="SELECT doctor_id FROM doctors ORDER BY doctor_id DESC LIMIT 1";
		$new_id=0;
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$new_id=(int)$value['doctor_id'];
		}
		$new_id=$new_id+1;
		return $new_id;
	}

	//function to check if doctor phone are not existed
	public function check_phone($phone){
		global $con;
		$state=false;
		$query="SELECT phone FROM doctors WHERE phone='$phone'";
		$num=$this->rows($con,$query);
		if($num>0){
			$state=true;
		}else{
			$state=false;
		}

		return $state;
	}
	//function to check if doctor email are not existed
	public function check_email($email){
		global $con;
		$state=false;
		$query="SELECT email FROM doctors WHERE email='$email'";
		$num=$this->rows($con,$query);
		if($num>0){
			$state=true;
		}else{
			$state=false;
		}

		return $state;
	}
	//function to save doctor
	public function save_doctor($doctor_id,$hospital_id,$names,$email,$password,$address,$phone,$department,$status){
		global $con;
		$password=md5($password);
		$query="INSERT INTO doctors(doctor_id,hospital_id,names,email,
									password,address,phone,
									department,status,profile_image)

					        VALUES ('$doctor_id','$hospital_id','$names','$email',
					                '$password','$address','$phone','$department',
					                '$status','null')";

		$status=$this->insert($con,$query);
		return $status;
	}

	//function to return all doctors information 
	public function get_all_doctors($hospital_id){
		global $con;
		$query="SELECT * FROM doctors 
				WHERE hospital_id=\"$hospital_id\"
				AND status!='DELETED'
				ORDER BY doctor_id DESC ";
				
		$result=array();
		$result=$this->select($con,$query);
		return $result;
	}

	//get doctor from given hospital and Department
	public function getDepartmentDoctors($hospital_id,$department_id){
		global $con;
		$query="SELECT * FROM doctors
				WHERE hospital_id=\"$hospital_id\"
				AND department=\"$department_id\"";
		$result=$this->select($con,$query);
		return $result;
	}
	############################### END OF DOCTOR SESSION ###################################

	############################### NURSE SESSIONS #######################################
	/*
	1.Function to create nurse_id@
	2.function to check if nurse_phone not registered@
	3.function to check if nurse email is not registered@
	4.function to save nurse information to database@
	5.function to return all nurse information from database@

	*/
	//function to create nurse id
	public function create_nurse_id(){
		global $con;
		$query="SELECT nurse_id FROM nurses ORDER BY nurse_id DESC LIMIT 1";
		$new_id=0;
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$new_id=(int)$value['nurse_id'];
		}
		$new_id=$new_id+1;
		return $new_id;
	}
	//function check nurse phone
	public function check_nurse_phone($phone){
		global $con;
		$state=false;
		$query="SELECT phone FROM nurses WHERE phone='$phone'";
		$num=$this->rows($con,$query);
		if($num>0){
			$state=true;
		}else{
			$state=false;
		}

		return $state;
	}
	//function check nurse email
	public function check_nurse_email($email){
		global $con;
		$state=false;
		$query="SELECT email FROM nurses WHERE email='$email'";
		$num=$this->rows($con,$query);
		if($num>0){
			$state=true;
		}else{
			$state=false;
		}

		return $state;
	}
	//function to save nurse information
	public function save_nurse($nurse_id,$hospital_id,$names,$email,$password,$address,
		$phone,$status){
		global $con;
		$password=md5($password);
		$query="INSERT INTO nurses(nurse_id,hospital_id,names,email,password,address,phone
		,status,regDate) 
		VALUES ('$nurse_id','$hospital_id','$names','$email',\"$password\",'$address','$phone',
		'$status',CURRENT_TIMESTAMP)";
		$status=$this->insert($con,$query);
		return $status;
	}

	//function to return all nurses informations from database
	public function get_nurses($hospital_id){
		global $con;
		$result=array();
		$query="SELECT * FROM nurses 
				WHERE hospital_id=\"$hospital_id\"
				AND status!='DELETED'
				ORDER BY nurse_id DESC limit 50";
		$result=$this->select($con,$query);
		return $result;
	}

	//function to delete a nurse
	public function deleteNurse($nurse_id){
		global $con;
		$query="UPDATE receptionists 
				SET status='DELETED' 
				WHERE receptionist_id=\"$receptionist_id\"
				";
		$status=$this->update($con,$query);
		return $status;
	}
	##################### END OF NURSE SESSIONS #############################

	##################### RECEPTIONIST SESSIONS #####################################
	/*
	1.function to create receptionist id
	2.function to check receptionist id 
	3.function to check to receptionist phone if not already registered
	4.function to check receptionist email if it not already registered
	5.function to save receptionist informations.
	6.function to return all receptionist information.
	*/

	//function to create receptionist id
	public function create_receptionist_id(){
		global $con;
		$query="SELECT receptionist_id FROM receptionists ORDER BY receptionist_id DESC LIMIT 1";
		$new_id=0;
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$new_id=(int)$value['receptionist_id'];
		}
		$new_id=$new_id+1;
		return $new_id;
	}

	//function to check rec email
	public function check_rec_email($email){
		global $con;
		$state=false;
		$query="SELECT email FROM receptionists WHERE email='$email'";
		$num=$this->rows($con,$query);
		if($num>0){
			$state=true;
		}else{
			$state=false;
		}

		return $state;
	}

	//function to check rec phone
	public function check_rec_phone($phone){
		global $con;
		$state=false;
		$query="SELECT phone FROM receptionists WHERE phone='$phone'";
		$num=$this->rows($con,$query);
		if($num>0){
			$state=true;
		}else{
			$state=false;
		}

		return $state;	
	}

	//function to save rec record
	public function save_receptionist($receptionist_id,$hospital_id,$names,
		$email,$password,$address,
		$phone,$profile_image,$status){

		global $con;
		$password=md5($password);
		$query="INSERT INTO receptionists(receptionist_id,hospital_id,names,email,password,
										  address,phone,profile_image,status)
						        VALUES  ('$receptionist_id','$hospital_id','$names',
						        		'$email','$password','$address','$phone',
						        		'$profile_image','$status')";
		$state=$this->insert($con,$query);
		return $state;
	}
	//functoin to return all receptionist for a hospital
	public function get_all_receptionists($hospital_id){
		global $con;
		$query="SELECT * FROM receptionists
			    WHERE hospital_id=\"$hospital_id\"
			    AND status!='DELETED'
				ORDER BY receptionist_id DESC ";
		$result=array();
		$result=$this->select($con,$query);
		return $result;
	}

	//function to delete  receptionist
	public function deleteReceptionist($receptionist_id){
		global $con;
		$query="UPDATE receptionists 
				SET status='DELETED' 
				WHERE receptionist_id=\"$receptionist_id\"
				";
		$status=$this->update($con,$query);
		return $status;
	}

	##################### END OF RECEPTIONIST SESSIONS #############################

	##################### HOSPITAL ADMIN DASHBOARD COUNTERS ###################
	//function to return tables counter of Hospital admin
	public function hospital_admin_rows($table,$hospital_id){
		global $con;
		$query="";
		if($table=="referrals" OR $table=="counter_referrals"){
			$query="SELECT DISTINCT * FROM ".$table." WHERE from_hospital_id=\"$hospital_id\"";
		}else{
			$query="SELECT DISTINCT * FROM ".$table." WHERE hospital_id=\"$hospital_id\"";
		}
		
		$num=$this->rows($con,$query);
		return $num;
	}
	##################### END OF HOSPITAL ADMIN DASHBOARD COUNTER ############

	###################### HOSPITAL ADMIN PERSONAL PROFILE ####################
	public function get_profile_image($user_id){
		global $con;
		$profile_image="";
		$query="SELECT user_profile 
				FROM system_users 
				WHERE user_id=\"$user_id\"
				LIMIT 1";
		$result=array();
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$profile_image=$value['user_profile'];
		}

		return $profile_image;
	}
	##################### END OF HOSPITAL ADMIN PERSONAL PROFILE ##############
	################### HOSPITAL ADMIN REFERRAL PARTS ########################
	//function to get user hospital
	public function get_user_hospital($user_id){
		global $con;
		$hospital_id="";
		$query="SELECT hospital_id FROM system_users 
				WHERE user_id=\"$user_id\"
				LIMIT 1";
		$result=array();
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$hospital_id=$value['hospital_id'];
		}

		return $hospital_id;
	}
	######################## END OF HOSPITAL ADMIN REFERRAL PART ###########

	##################### CHECK IF HOSPITAL IS ACTIVATED ###################
	public function check_if_hospital_is_activated($hospital_id){
		global $con;
		$hospital_status="";
		$activate_status=false;
		$query="SELECT status FROM hospitals
				WHERE hospital_id=\"$hospital_id\"
				LIMIT 1";
		$result=array();
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$hospital_status=$value['status'];
		}
		if($hospital_status=="ACTIVATED"){
			$activate_status=true;
		}elseif($hospital_status=="PENDING"){
			$activate_status=false;
		}
	  return $activate_status;
	}

	##################### END OF CHECK HOSPITAL ACTIVATED #####################
	##################### DOCTOR ACTIVATE ACTION #####################################
	public function doctor_actions($option,$action,$status){
		global $con;
		$query="";
		$update_status=(($status=="PENDING")?'ACTIVATED':'PENDING');
		if($option=="change_status"){
			$query="UPDATE doctors SET status=\"$update_status\"
					WHERE doctor_id=\"$action\"
					LIMIT 1";
		}elseif($option=="delete"){
			$query="UPDATE doctors SET status='DELETED'
					WHERE doctor_id=\"$action\"
					LIMIT 1";
		}
		$status=$this->update($con,$query);
		return $status;
	}
	#################### END OF DOCTOR ACTIVATE ACTIONS ##############################
}
//instantiate class of hospital admin
$admin=new HospitalAdmin();
?>