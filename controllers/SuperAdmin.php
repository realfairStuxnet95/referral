<?php 
include_once 'Query.php';
class SuperAdmin extends Query{

	//function to check username
	public function check_user_name($uname){
		global $con;
		$state=false;
		$query="SELECT Access_name FROM superadmins WHERE Access_name='$uname'";
		$num=$this->rows($con,$query);
		if($num>0){
			$state=true;
		}else{
			$state=false;
		}
		return $state;
	}

	//function to check userid
	public function check_id($id){
		global $con;
		$state=false;
		$query="SELECT Super_id FROM superadmins WHERE Super_id='$id'";
		$num=$this->rows($con,$query);
		if($num>0){
			$state=true;
		}else{
			$state=false;
		}
		return $state;	
	}
	//function to hash password
	public function hash_password($password){
		$new_pass=md5($password);
		return $new_pass;
	}

	//function to validate admin
	public function validate_admin($username,$password){
		global $con;
		$result=array();
		$state=false;
		$query="SELECT Access_name,Super_key FROM superadmins WHERE Access_name='$username' AND Super_key='$password' LIMIT 1";
		$num=$this->rows($con,$query);
		if($num==1){
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			if(($value['Access_name']==$username) && ($value['Super_key']==$password)){
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

	//admin login info
	public function admin_session($username,$password){
		global $con;
		$result=array();
		$query="SELECT * FROM superadmins WHERE Access_name='$username' AND Super_key='$password' LIMIT 1";
		$result=$this->select($con,$query);
		return $result;
	}
	//function to udpate admin status
	public function update_status($id,$status){
		global $con;
		$query="UPDATE superadmins SET is_online='$status' WHERE Super_id='$id' LIMIT 1";
		$state=$this->update($con,$query);
		return $state;
	}

	//function to return all user data
	public function get_admin($id){
		global $con;
		$query="SELECT * FROM superadmins WHERE Super_id='$id' LIMIT 1";
		$data=array();
		$data=$this->select($con,$query);
		return $data;
	}

	############################## SUPER ADMIN ACTIONS PLACE ##################

	//function to get all available hospital in system]

	public function get_hospitals($options,$initial){
		global $con;
		$query="";
		$result=array();
		$allowed=array('*','PENDING','ACTIVATED');
		if(in_array($options,$allowed)){
			switch ($options) {
				case '*':
				$query="SELECT * FROM hospitals 
						WHERE status!='DELETED' AND hospital_id>=\"$initial\" 
						ORDER BY hospitals.hospital_id DESC 
						LIMIT 20";
					break;
				case 'PENDING':
					$query="SELECT * FROM hospitals 
							WHERE status=\"$options\"
							 AND (hospital_id>=\"$initial\")
							 LIMIT 20";
					break;
				case 'ACTIVATED':
					$query="SELECT * FROM hospitals 
							WHERE status=\"$options\"
							ORDER BY hospitals.hospital_id DESC
							LIMIT 20";
					break;		
			}	

		//EXECUTE QUERY
		
		$result=$this->select($con,$query);
		}else{
			$result[0]="error";
		}
		return $result;
	}

	//function to delete hospital data
	public function deleteHospital($hospital_id){
		global $con;
		$query="UPDATE hospitals SET status='DELETED' WHERE hospital_id=\"$hospital_id\"
				LIMIT 1";
		$status=$this->update($con,$query);
		return $status;
	}
	//function to update hospital status activate or pending
	public function updateHospital($hospital_id,$status){
		global $con;
		$query="UPDATE hospitals SET status=\"$status\" WHERE hospital_id=\"$hospital_id\" LIMIT 1";
		$status=$this->update($con,$query);
		return $status;
	}

	//function to update doctor status activate or pending
	public function updateDoctor($doctor_id,$status){
		global $con;
		$query="UPDATE doctors SET status=\"$status\" 
				WHERE doctor_id=\"$doctor_id\" LIMIT 1";

		$status=$this->update($con,$query);
		return $status;
	}
	//function to return all doctors information 
	public function get_doctors($options,$initial){
		global $con;
		$query="";
		$result=array();
		$allowed=array('*','PENDING','ACTIVATED');
		if(in_array($options,$allowed)){
			switch ($options) {
				case '*':
				$query="SELECT * FROM doctors 
						WHERE status!='DELETED' AND doctor_id>=\"$initial\" 
						ORDER BY doctors.doctor_id DESC 
						LIMIT 20";
					break;
				case 'PENDING':
					$query="SELECT * FROM doctors 
							WHERE status=\"$options\"
							 AND (doctor_id>=\"$initial\")
							 LIMIT 20";
					break;
				case 'ACTIVATED':
					$query="SELECT * FROM doctors 
							WHERE status=\"$options\"
							AND (doctor_id>=\"$initial\")
							ORDER BY doctors.doctor_id DESC
							LIMIT 20";
					break;		
			}	

		//EXECUTE QUERY
		
		$result=$this->select($con,$query);
		}else{
			$result[0]="error";
		}
		return $result;
	}

	//function to get all departments available in the system
	public function get_departments($options,$initial)
	{
		global $con;
		$query="";
		$result=array();
		$allowed=array('*','PENDING','ACTIVATED');
		if(in_array($options,$allowed)){
			switch ($options) {
				case '*':
				$query="SELECT DISTINCT * FROM department 
						WHERE status!='DELETED' AND department_id>=\"$initial\" 
						ORDER BY department.department_id DESC 
						LIMIT 20";
					break;
				case 'PENDING':
					$query="SELECT DISTINCT * FROM department 
							WHERE status=\"$options\"
							 AND (department_id>=\"$initial\")
							 LIMIT 20";
					break;
				case 'ACTIVATED':
					$query="SELECT DISTINCT * FROM department 
							WHERE status=\"$options\"
							AND (department_id>=\"$initial\")
							ORDER BY department.department_id DESC
							LIMIT 20";
					break;		
			}	

		//EXECUTE QUERY
		
		$result=$this->select($con,$query);
		}else{
			$result[0]="error";
		}
		return $result;	
	}
	public function get_system_departments($options,$initial)
	{
		global $con;
		$query="";
		$result=array();
		$allowed=array('*','PENDING','ACTIVATED');
		if(in_array($options,$allowed)){
			switch ($options) {
				case '*':
				$query="SELECT DISTINCT * FROM system_departments 
						WHERE status!='DELETED' AND id>=\"$initial\" 
						ORDER BY id DESC 
						LIMIT 20";
					break;
				case 'PENDING':
					$query="SELECT DISTINCT * FROM system_departments 
							WHERE status=\"$options\"
							 AND (id>=\"$initial\")
							 LIMIT 20";
					break;
				case 'ACTIVATED':
					$query="SELECT DISTINCT * FROM system_departments 
							WHERE status=\"$options\"
							AND (id>=\"$initial\")
							ORDER BY id DESC
							LIMIT 20";
					break;		
			}	

		//EXECUTE QUERY
		
		$result=$this->select($con,$query);
		}else{
			$result[0]="error";
		}
		return $result;	
	}
	//function to get hospitals

	//search doctors by department ,hospital,names address
	public function search_doctors($department_id,$hospital_id,$search_field,$status){
		//here we must check submitted fields
		global $con;
		$query="";
		$result=array();
		$department_id=(int)$department_id;
		$hospital_id=(int)$hospital_id;
		if($department_id>0){
			//it means we must search doctor by their department ids
			$query="SELECT * FROM doctors WHERE department=\"$department_id\"
					ORDER BY doctor_id DESC LIMIT 20";

		}else if($hospital_id>0){
			$query="SELECT * FROM doctors WHERE hospital_id=\"$hospital_id\" 
					ORDER BY doctor_id DESC LIMIT 20";

		}else if(strlen($search_field)>0 && $search_field!='*'){
			$query="SELECT * FROM doctors 
					WHERE names LIKE \"%$search_field%\" 
						OR email LIKE \"%$search_field%\" 
						OR(address LIKE \"%$search_field%\")
						ORDER BY doctor_id DESC LIMIT 20";

		}else if($search_field=='*'){
			$query="SELECT * FROM doctors 
						WHERE status!='DELETED' 
						ORDER BY doctors.doctor_id DESC 
						LIMIT 20";

		}else if(strlen($status)>0){
			$query="SELECT * FROM doctors 
					WHERE STATUS=\"$status\" 
					ORDER BY doctor_id DESC LIMIT 20";
		}elseif(($department_id==0 && $hospital_id==0) && ($search_field=='' && $status=='')){
			$query="SELECT * FROM doctors 
					WHERE names LIKE \"%$search_field%\" 
						OR email LIKE \"%$search_field%\" 
						OR(address LIKE \"%$search_field%\")
						ORDER BY doctor_id DESC LIMIT 20";	
		}

		//now we can run our query
		if(!empty($query)){
			$result=$this->select($con,$query);
		}
		

		return $result;
	}

	//function to doctors operations like update,delete
	public function doctorOperations($doctor_id,$operation){

	}
	############################# END OF SUPER ADMIN ACTIONS PLACE ############

	
############################# SYSTEM BLOG #################################
	//function to create new id for tables like BLOG,ANNOUNCEMENTS

	public function create_id($table,$id_field){
		global $con;
		$result=array();
		$new_id=0;
		$query="SELECT ".$id_field." FROM ".$table." ORDER BY ".$id_field." DESC LIMIT 1";
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$new_id=$value[$id_field];
		}
		$new_id=$new_id+1;
		return $new_id;
	}

	//system blog actions with no return data such as [DELETE,UPDATE,INSERT]
	public function blog_actions($option,$blog_id,$blog_title,$category,
								$description,$tags,$embed,$status){
		global $con;
		$query="";
		$option=(int)$option;
		if($option==1){
			$query="INSERT INTO system_blog(blog_id,blog_title,category,
								description,tags,embed,status) 
					VALUES (\"$blog_id\",\"$blog_title\",\"$category\",\"$description\",\"$tags\",\"$embed\",\"$status\")";
		}elseif($option==2){
			$query="DELETE FROM system_blog WHERE blog_id=\"$blog_id\" LIMIT 1";
		}
		$status=$this->insert($con,$query);
		return $status;
	}
	//function to get system blog and their attachments
	public function get_blogs(){
		global $con;
		$query="SELECT DISTINCT system_blog.*,blog_attachments.file_name
			     FROM system_blog JOIN blog_attachments
			     ON system_blog.blog_id=blog_attachments.blog_id
			     ORDER BY system_blog.blog_id DESC LIMIT 10";

		$result=array();
		$result=$this->select($con,$query);
		return $result;
	}

	//function to get blog image
	public function get_blog_poster($blog_id){
		global $con;
		$query="SELECT blog_attachments.file_name 
				FROM blog_attachments 
				WHERE blog_attachments.blog_id=\"$blog_id\"";
		$result=array();
		$result=$this->select($con,$query);
		return $result;
	}
	//function to check blog post
	public function check_blog($blog_id){
		global $con;
		$status=false;
		$query="SELECT * FROM system_blog 
				WHERE blog_id=\"$blog_id\" 
				LIMIT 1";
		$num=$this->rows($con,$query);
		if($num==1){
			$status=true;
		}else{
			$status=false;
		}

		return $status;
	}

	//function to get blog details
	public function get_blog_details($blog_id){
		global $con;
		$query="SELECT system_blog.*,blog_attachments.file_name
			     FROM system_blog LEFT JOIN blog_attachments
			     ON system_blog.blog_id=blog_attachments.blog_id
			     WHERE system_blog.blog_id=\"$blog_id\" LIMIT 1";

		$result=array();
		$result=$this->select($con,$query);
		return $result;
	}

	//function to get other posts
	public function get_other_blogs($blog_id){
		global $con;
		$query="SELECT system_blog.*,blog_attachments.file_name
			     FROM system_blog LEFT JOIN blog_attachments
			     ON system_blog.blog_id=blog_attachments.blog_id
			     WHERE system_blog.blog_id!=\"$blog_id\"
			     ORDER BY system_blog.blog_id DESC
			     LIMIT 10";
			     
		$result=array();
		$result=$this->select($con,$query);
		return $result;
	}
	//function to update blog
	public function updateBlog($blog_id,$title,$description,$embed,$poster){
		global $con;
		$status=false;
		$query="UPDATE system_blog SET blog_title=\"$title\",description=\"$description\",embed=\"$embed\" WHERE blog_id=\"$blog_id\" LIMIT 1";

		$query1="INSERT INTO blog_attachments(blog_id,file_name)
					VALUES(\"$blog_id\",\"$poster\")";

		$update=$this->update($con,$query);
		if($update){
			$save=$this->insert($con,$query1);
			if($save){
				$status=true;
			}else{
				$status=false;
			}
		}else{
			$status=false;
		}

		return $status;
	}

	############################# END OF SYSTEM BLOG ##########################

	############################ SYSTEM MESSAGES AND NOTIFICATIONS ########
	//function to get user types
	public function get_users_types(){
		global $con;
		$query="SELECT * FROM user_types";
		$result=array();
		$result=$this->select($con,$query);
		return $result;
	}
	//function to get system notifications
	public function get_system_messages(){
		global $con;
		$query="SELECT * FROM system_announcements 
				WHERE status!='DELETED'
				ORDER BY ann_id DESC
				LIMIT 10";
		$result=array();
		$result=$this->select($con,$query);
		return $result;	
	}

	//function to save system messages
	public function save_system_message($ann_id,$title,$category,$target,$description,$status){
		global $con;
		$query="INSERT INTO system_announcements(ann_id,title,category,
												target,description,status) 
		VALUES (\"$ann_id\",\"$title\",\"$category\",\"$target\",\"$description\",\"$status\")";

		$status=$this->insert($con,$query);
		return $status;
	}

	//function to do some actions about system announcements
	public function system_messages($option,$ann_id,$title,$category,$target,$description){
		global $con;
		$query="";
		$query1="";
		$status=false;
		if($option==1){
			//save announcement
			$query="INSERT INTO system_announcements(ann_id,title,category,
												target,description,status) 
					VALUES (\"$ann_id\",\"$title\",\"$category\",
					\"$target\",\"$description\",'ACTIVE')";

			$query1="UPDATE system_announcements SET status='INACTIVE'
					 WHERE ann_id!=\"$ann_id\"
					 ";
		}elseif($option==3){
			//UPDATE ANNOUNCEMENT
			$query="UPDATE system_announcements 
					SET title=\"$title\",category=\"$category\",
					target=\"$target\",description=\"$description\"
					WHERE ann_id=\"$ann_id\" LIMIT 1";
		}elseif($option==2){
			//delete notification
			$query="UPDATE system_announcements 
					SET status='DELETED'
					WHERE ann_id=\"$ann_id\"
					LIMIT 1";
		}

		if($query!=""){
			$status=$this->insert($con,$query);
			if($option==1){
				$state=$this->update($con,$query1);
			}
		}else{
			$status=false;
		}

		return $status;
	}
	########################### END OF SYSTEM MESSAGES AND NOTIFICATIONS ########

	######################### SYSTEM DASHBOARD COUNT RETURNS ####################
	//function to return rows count from table such as doctors,hospital admins,hospitals
	public function get_table_rows($table){
		global $con;
		$num='error';
		$allowed=array('hospitals','blog_attachments','counter_referrals','counter_ref_attachments','department','doctors','hospitals_category','hospital_regions','navigations','nurses','receptionists','referrals','referral_attachments','referral_info','referral_notifications','system_announcements','system_blog','system_users','transport_mode','user_types','system_departments');
		if(in_array($table, $allowed)){
			$query="SELECT DISTINCT * FROM ".$table;
			$num=$this->rows($con,$query);
		}
		return $num;
	}
	######################### END OF DASHBOARD COUNT RETURNS #################

	###################### HOSPITAL LOCATIONS ##############################

	//function to get hospitals locations
	public function get_hospitals_locations(){
		global $con;
		$query="SELECT * FROM hospital_regions 
				WHERE status='ACTIVE'
				ORDER BY region_title ASC";
		$result=array();
		$result=$this->select($con,$query);

		return $result;
	}

	//function to save hospital locations
	public function save_hospital_location($id,$region_title,$description,$status){
		global $con;
		$query="INSERT INTO hospital_regions(id,region_title,description,status) 
		VALUES (\"$id\",\"$region_title\",\"$description\",\"$status\")";
		$status=$this->insert($con,$query);
		return $status;
	}

	//function to include Hospital Location action SUCH AS DELETE,UPDATE,ADD
	public function hospitals_locations($option,$id,$region_title,$description,$status){
		global $con;
		$query="";
		$status=false;
		if($option==1){
			//save location
			$query="INSERT INTO hospital_regions(id,region_title,description,status) 
					VALUES(\"$id\",\"$region_title\",\"$description\",'ACTIVE')";
		}elseif($option==2){
			//delete location
			$query="UPDATE hospital_regions SET status='DELETED'
					WHERE id=\"$id\"
					LIMIT 1";
		}elseif($option==3){
			//update record
			$query="UPDATE hospital_regions SET
					region_title=\"$region_title\",
					description=\"$description\"
					WHERE id=\"$id\"
					LIMIT 1";
		}
		if($query!=""){
			$status=$this->insert($con,$query);
		}else{
			$status=false;
		}

		return $status;

	}
	###################### END OF HOSPITAL LOCATION #######################

	###################### HOSPITAL CATEGORIES ##########################
	 //function to return hospital categories
	public function get_all_categories(){
		global $con;
		$query="SELECT * FROM hospitals_category
				WHERE status!='DELETED'";
		$result=array();
		$result=$this->select($con,$query);
		return $result;
	}

	//function to contain hospital categories actions such as ADD,EDIT,DELETE
	public function hospitals_categories($option,$id,$category_name,$description){
		global $con;
		$query="";
		$status=false;
		if($option==1){
			//save category
			$query="INSERT INTO hospitals_category(id,category_name,description,status)
					VALUES (\"$id\",\"$category_name\",\"$description\",'ACTIVE')";
		}elseif($option==2){
			//delete category
			$query="UPDATE hospitals_category SET status='DELETED'
					WHERE id=\"$id\" LIMIT 1";
		}elseif($option==3){
			//update category
			$query="UPDATE hospitals_category 
					SET category_name=\"$category_name\",
					description=\"$description\"
					WHERE id=\"$id\" LIMIT 1";
		}
		if($query!=""){
			$status=$this->insert($con,$query);
		}else{
			$status=false;
		}

		return $status;
	}
	###################### END OF HOSPITAL CATEGORIES ###################

	###################### HOSPITALS DEPARTMENTS #######################
	public function get_hospitals_deparments(){
		global $con;
		$query="SELECT * FROM system_departments
				WHERE status!='DELETED'";
		$result=array();
		$result=$this->select($con,$query);
		return $result;
	}

	//function to include hospitals deparments actions such as ADD,EDIT,DELETE
	public function hospitals_deparments($option,$id,$name,$description){
		global $con;
		$status=false;
		$query="";
		if($option==1){
			//save deparment
			$query="INSERT INTO system_departments(id,name,description,status) 			VALUES (\"$id\",\"$name\",\"$description\",'ACTIVE')";
		}elseif($option==2){
			//delete department
			$query="UPDATE system_departments 
					SET status='DELETED'
					WHERE id=\"$id\"
					LIMIT 1";
		}elseif($option==3){
			//update department
			$query="UPDATE system_departments
					SET name=\"$name\",
					description=\"$description\"
					WHERE id=\"$id\" LIMIT 1";
		}

		if($query!=""){
			$status=$this->insert($con,$query);
		}else{
			$status=false;
		}

		return $status;
	}
	###################### END OF HOSPITAL DEPARTMENTS ####################
	###################### NURSE AND RECEPTIONIST SEARCH ###############################
	public function nurse_receptionist($table,$option,$input){
		global $con;
		$result=array();
		$query="";
		if($option=="*"){
			$query="SELECT * FROM ".$table;
		}elseif($option=="by_status"){
			$query="SELECT * FROM ".$table." WHERE status=\"$input\"";
		}elseif($option=="by_hospital"){
			$query="SELECT * FROM ".$table." WHERE hospital_id=\"$input\"";
		}elseif($option=="by_search"){
			$query="SELECT * FROM ".$table.
					" WHERE names LIKE \"%$input%\" OR email LIKE \"%$input%\" 
					  OR address LIKE \"%$input%\"";
		}
		$result=$this->select($con,$query);

		return $result;
	}
	###################### END OF NURSE AND RECEPTION SEARCH ###########################
	##################### HOSPITAL SEARCH ##########################################
	public function hospital_information($option,$input){
		global $con;
		$query="";
		$result=array();
		if($option=="*"){
			$query="SELECT * FROM hospitals ORDER BY hospital_name ASC ";
		}elseif($option=="by_status"){
			$query="SELECT * FROM hospitals  
					WHERE status=\"$input\"";
		}elseif($option=="by_location"){
			$query="SELECT * FROM hospitals
					WHERE location=\"$input\"";
		}elseif($option=="by_category"){
			$query="SELECT * FROM hospitals
					WHERE category=\"$input\"";
		}elseif($option=="by_search"){
			$query="SELECT * FROM hospitals
					WHERE hospital_name LIKE \"%$input%\" OR director_name LIKE \"%$input%\"
					OR (address_location LIKE \"%$input%\" OR description LIKE \"%$input%\")
					OR slogan LIKE \"%$input%\"";
		}

		$result=$this->select($con,$query);

		return $result;
	}
	//function to get hospital categories
	public function get_hospital_categories(){
		global $con;
		$categories=array();
		$query="SELECT * FROM hospitals_category
				WHERE status!='DELETED'";
		$categories=$this->select($con,$query);
		return $categories;
	}	

	####################### END OF HOSPITAL SEARCH ##################################
	##################### HOSPITAL ACTION #####################################
	public function hospitals_actions($option,$action,$status){
		global $con;
		$query="";
		$update_status=(($status=="PENDING")?'ACTIVATED':'PENDING');
		if($option=="change_status"){
			$query="UPDATE hospitals SET status=\"$update_status\"
					WHERE hospital_id=\"$action\"
					LIMIT 1";
		}elseif($option=="delete"){
			$query="UPDATE hospitals SET status='DELETED'
					WHERE hospital_id=\"$hospital_id\"
					LIMIT 1";
		}
		$status=$this->update($con,$query);
		return $status;
	}
	#################### END OF HOSPITAL ACTIONS ##############################
	##################### TRANSPORT MODES ##################################
	public function get_transport_modes(){
		global $con;
		$query="SELECT * FROM transport_mode
				WHERE status!='DELETED'";
		$result=array();
		$result=$this->select($con,$query);

		return $result;
	}
	//function to contain hospital categories actions such as ADD,EDIT,DELETE
	public function transport_mode_actions($option,$id,$transport_name){
		global $con;
		$query="";
		$status=false;
		if($option==1){
			//save category
			$query="INSERT INTO transport_mode(id,transport_name,status)
					 VALUES (\"$id\",\"$transport_name\", 'ACTIVE')";

		}elseif($option==2){
			//delete category
			$query="UPDATE transport_mode SET status='DELETED'
					WHERE id=\"$id\" LIMIT 1";
		}elseif($option==3){
			//update category
			$query="UPDATE transport_mode 
					SET transport_name=\"$transport_name\"
					WHERE id=\"$id\" LIMIT 1";
		}
		if($query!=""){
			$status=$this->insert($con,$query);
		}else{
			$status=false;
		}

		return $status;
	}
	################### END OF TRANSPORT MODE ##############################
}
$super=new SuperAdmin();
?>