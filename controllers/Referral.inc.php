	<?php 
include_once 'Query.php';

class Referral extends Query{

	/*
	WHAT THIS CLASS WILL BE USED FOR
	1.save referral form data
	2.save referral attached files
	3.get referral informations
	4.get referral attached information
	*/

	//function to create new referral id
	public function create_referral_id(){
		global $con;
		$result=array();
		$id=0;
		$query="SELECT referral_id FROM referrals ORDER BY referral_id DESC limit 1";
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$id=$value['referral_id'];
		}
		$id=$id+1;
		return $id;
	}

	//function to return ongoing referrals
	public function ongoing_referrals($from_hospital_id,$options,$status,$number,$input){
		global $con;
		$query="SELECT * FROM referrals 
				WHERE from_hospital_id=\"$from_hospital_id\"
				";
		if($options==1){
			$query.=" AND status=\"$status\"";
		}elseif($options==2){
			$query.=" AND referral_id=\"$number\"";
		}elseif($options==3){
			$query.=" AND patient_fname LIKE \"%$input%\" OR patient_lname LIKE \"%$input%\" OR (patient_phone LIKE \"%$input%\" OR to_hospital_name LIKE \"%$input%\")";
		}
		$query.=" AND status!='DELETED' ORDER BY referral_id DESC";
		$result=$this->select($con,$query);
		return $result;
	}
	public function ongoing_dates(){
		global $con;
		$query="SELECT DISTINCT regDate FROM referrals ORDER BY referral_id DESC ";
		return $this->select($con,$query);
	}
	//function to return incoming referrals
	public function incoming_referrals($to_hospital_id){
		global $con;
		$result=array();
		$query="SELECT * FROM referrals WHERE to_hospital_id=\"$to_hospital_id\"";
		$result=$this->select($con,$query);
		return $result;
	}

	//function to update referral status
	public function update_referral_status($referral_id,$status){
		global $con;
		$query="UPDATE referrals SET status=\"$status\" WHERE referral_id=$referral_id";
		$update_state=$this->update($con,$query);
		return $update_state;
	}

	//function to save referral extra information
	public function save_referral_info($info_id,$referral_id,$sender_id,$senderType){
		global $con;
		$query="INSERT INTO referral_info(info_id,referral_id,sender_id)
		VALUES ($info_id,$referral_id,$sender_id,$senderType)";
	}
	public function create_info_id(){
		global $con;
		$result=array();
		$id=0;
		$query="SELECT info_id FROM referral_info ORDER BY info_id DESC limit 1";
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$id=$value['info_id'];
		}
		$id=$id+1;
		return $id;	
	}
	//function to create referral attachment id
	public function create_attachment_id(){
		global $con;
		$result=array();
		$id=0;
		$query="SELECT attach_id FROM referral_attachments ORDER BY attach_id DESC limit 1";
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$id=$value['attach_id'];
		}
		$id=$id+1;
		return $id;
	}
	//function to save referral attachment informations
	public function save_referral_files($attach_id,$referral_id,$filename,$type,$size,$error,$status){
		global $con;
		$query="INSERT INTO referral_attachments(attach_id,referral_id,file_name,type,size,error,status)
	        VALUES
	        ($attach_id,$referral_id,\"$filename\",\"$type\",\"$size\",$error,\"$status\")";
	    $status=$this->insert($con,$query);
	    return $status;
	}
	public function get_referral_attachments($referral_id){
		global $con;
		$query="SELECT * FROM referral_attachments
				WHERE referral_id=\"$referral_id\"
				AND status='ACTIVE'";
		return $this->select($con,$query);
	}
	########################## SAVE REFERRAL STEPS ##########################################

	//function to register step1
	public function step1($referral_id,$patient_fname,$patient_lname,$patient_id_no,
		$patient_phone,$patient_dob,$patient_sex,$guardian,$guardian_phone){
		global $con;
		$query="INSERT INTO referrals(referral_id,patient_fname,patient_lname,
									  patient_id_no,patient_phone,patient_dob,
									  patient_sex,guardian,guardian_phone)
							   VALUES(\"$referral_id\",\"$patient_fname\",\"$patient_lname\",
							   		 \"$patient_id_no\",\"$patient_phone\",\"$patient_dob\",
							   		 \"$patient_sex\",\"$guardian\",\"$guardian_phone\")";
	$status=$this->insert($con,$query);
	return $status;
	}

	//function to register step2
	public function step2($referral_id,$from_hospital_name,
		$from_hospital_id,$to_hospital_name,$physician_name,$physician_phone,
		$to_hospital_id,$mode_of_transport,$department){
		global $con;
		$query="UPDATE referrals SET from_hospital_name=\"$from_hospital_name\",from_hospital_id=\"$from_hospital_id\",
		        physician_name=\"$physician_name\",physician_phone=\"$physician_phone\",to_hospital_id=\"$to_hospital_id\",
		        to_hospital_name=\"$to_hospital_name\",mode_of_transport=\"$mode_of_transport\",
		        receive_department=\"$department\"
		        WHERE referral_id=\"$referral_id\"";

		$status=$this->update($con,$query);
		return $status;
	}

	public function step3($referral_id,$hospital_admission_date,
		$stay_length,$tranfer_date,$transfer_reasons,$patient_diagnostic,
		$illness_history,$past_medical,$info_summary,$attachments,
		$status){
		global $con;
		$query="UPDATE referrals SET hospital_admission_date=\"$hospital_admission_date\",stay_length=\"$stay_length\",
									 tranfer_date=\"$tranfer_date\",patient_diagnostic=\"$patient_diagnostic\",
									 illness_history=\"$illness_history\",past_medical=\"$past_medical\",info_summary=\"$info_summary\",
									 attachments=\"$attachments\",status=\"$status\"";
		$status=$this->update($con,$query);
		return $status;
	}
	//function to check if referral is not already registered
	public function check_referral_id($referral_id){
		global $con;
		$status=false;
		$query="SELECT referral_id FROM referrals WHERE referral_id=$referral_id";
		$num=$this->rows($con,$query);
		if($num==1){
			$status=true;
		}else{
			$status=false;
		}

		return $status;
	}
	//function to get last referral saved for more info
	public function get_last_referral_id(){
		global $con;
		$query="SELECT referral_id FROM referrals ORDER BY referral_id DESC LIMIT 1";
		$result=array();
		$last_id="";
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$last_id=$value['referral_id'];
		}

		return $last_id;
	}
	########################## END OF REFERRAL STEPS #######################################
	//function to save referral
	public function save_referral($referral_id,$patient_fname,$patient_lname,$patient_id_no,
		$patient_phone,$patient_dob,$patient_sex,$from_hospital_name,
		$from_hospital_id,$to_hospital_name,$physician_name,$physician_phone,
		$to_hospital_id,$mode_of_transport,$mode_of_transport_id,$hospital_admission_date,
		$stay_length,$tranfer_date,$transfer_reasons,$patient_diagnostic,
		$illness_history,$past_medical,$info_summary,$attachments,
		$status){
		global $con;

	$query1="INSERT INTO referrals(referral_id,patient_fname,patient_lname,patient_id_no,patient_phone,patient_dob,patient_sex,from_hospital_name,from_hospital_id,to_hospital_name,physician_name,physician_phone,to_hospital_id,mode_of_transport,mode_of_transport_id,hospital_admission_date,stay_length,tranfer_date,transfer_reasons,patient_diagnostic,illness_history,past_medical,info_summary,attachments,status,regDate)
	 VALUES
	 ($referral_id,\"$patient_fname\",\"$patient_lname\",$patient_id_no,
	 $patient_phone,$patient_dob,$patient_sex,\"$from_hospital_name\",
	 $from_hospital_id,\"$to_hospital_name\",\"$physician_name\",$physician_phone,
	 $to_hospital_id,$mode_of_transport,$mode_of_transport_id,
	 $hospital_admission_date,$stay_length,$tranfer_date,
	 \"$transfer_reasons\",\"$patient_diagnostic\",\"$illness_history\",
	 \"$past_medical\",\"$info_summary\",$attachments,$status, CURRENT_TIMESTAMP);";

	$status=$this->insert($con,$query1);
	return $status;
	}

	//function to get all referrals
	public function get_ongoing_referrals(){
		global $con;

		$query="SELECT * FROM referrals ORDER BY referral_id DESC LIMIT 4";
		$referrals=array();
		$referrals=$this->select($con,$query);
		return $referrals;
	}

	######################### REFFERAL NOTIFICATIONS ##############################

	//function to create referral notification id
	public function create_notification_id(){
		global $con;
		$result=array();
		$id=0;
		$query="SELECT notification_id FROM referral_notifications ORDER BY notification_id DESC limit 1";
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$id=$value['referral_id'];
		}
		$id=$id+1;
		return $id;
	}

	//function to save referral notification
	public function save_referral_notification($notification_id,$referral_id,$sender_id,
												  $receiver_hospital,$title,$body,$type,$status){
		global $con;
		$query="INSERT INTO referral_notifications(notification_id,referral_id,sender_id,
												  receiver_hospital,title,body,type,status)
				VALUES (\"$notification_id\",\"$referral_id\",\"$sender_id\", 
				\"$receiver_hospital\", \"$title\", \"$body\", \"$type\",\"$status\")";
		$status=$this->insert($con,$query);
		return $status;
	}

	//function to check if referral has notification
	public function hospital_notifications($hos_id){
		global $con;

		$query="SELECT notification_id FROM referral_notifications 
				WHERE receiver_hospital=\"$hos_id\"";
		$num=$this->rows($con,$query);

		return $num;
	}

	//function to get recent notification from us
	public function get_latest_notifications($hos_id){
		global $con;

		$query="SELECT notification_id FROM referral_notifications 
				WHERE receiver_hospital=\"$hos_id\" ORDER BY referral_id DESC LIMIT 5";
		$result=array();
		$result=$this->select($con,$query);

		return $result;
	}
	######################### END OF REFFERAL NOTIFICATIONS ###########################

	########################### GET REFERRAL DETAILS ###################################

	//function to get referral patient
	public function get_referral_patient($referral_id){
		global $con;
		$query="SELECT patient_fname,patient_lname FROM referrals WHERE referral_id=\"$referral_id\" LIMIT 1";
		$patient="";
		$result=array();
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$patient=$value['patient_fname'].' '.$value['patient_lname'];
		}

		return $patient;
	}

	//function to return referral dates
	public function referral_dates($referral_id){
		global $con;
		$query="SELECT hospital_admission_date,tranfer_date,regDate FROM referrals WHERE referral_id=\"$referral_id\" LIMIT 1";
		$result=array();
		$result=$this->select($con,$query);

		return $result;
	}

	//function to return from hospital informations
	public function from_hospital_info($referral_id){
		global $con;
		$hos_id="";
		$query="SELECT from_hospital_id FROM referrals WHERE referral_id=\"$referral_id\" LIMIT 1";
		$result=array();
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$hos_id=$value['from_hospital_id'];
		}
		//select hospital info
		unset($result);
		$query1="SELECT hospitals.*,hospital_regions.region_title 
				 	FROM hospitals JOIN hospital_regions ON
		 				hospitals.location=hospital_regions.id 
		 					WHERE hospital_id=\"$hos_id\"";

		$result=$this->select($con,$query1);
		return $result;
	}

	//function to return to hospital info
	public function to_hospital_info($referral_id){
		global $con;
		$hos_id="";
		$query="SELECT to_hospital_id FROM referrals WHERE referral_id=\"$referral_id\" LIMIT 1";
		$result=array();
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$hos_id=$value['to_hospital_id'];
		}
		//select hospital info
		unset($result);
		$query1="SELECT hospitals.*,hospital_regions.region_title 
				 	FROM hospitals JOIN hospital_regions ON
		 				hospitals.location=hospital_regions.id 
		 					WHERE hospital_id=\"$hos_id\"";

		$result=$this->select($con,$query1);
		return $result;
	}

	//function to get referral descriptions
	public function get_referral_description($referral_id){
		global $con;
		$query="SELECT patient_diagnostic,illness_history,past_medical,info_summary FROM referrals WHERE referral_id=\"$referral_id\"";
		$info=array();
		$info=$this->select($con,$query);
		return $info;
	}

	//function to get other referral information such as physician name,phone,mode of transport and receiving department
	public function get_other_referral_info($referral_id){
		global $con;
		$query="SELECT referrals.physician_name,referrals.physician_phone,referrals.mode_of_transport,referrals.receive_department,referral_attachments.* 
		FROM referrals JOIN referral_attachments
			ON referrals.referral_id=referral_attachments.referral_id 
						WHERE referrals.referral_id=\"$referral_id\"";
		$result=array();
		$result=$this->select($con,$query);
		return $result;
	}

	//function to get referral informations
	public function get_referral_info($options,$referral_id){
		global $con;
		$query="";
		$result=array();
		$options=(int)$options;
		if($options==1){
			$query="SELECT referrals.*,referral_attachments.* FROM referrals 
					JOIN referral_attachments
					ON referrals.referral_id=referral_attachments.referral_id
					WHERE referrals.referral_id=\"$referral_id\"";

		}elseif($options==2){
			$query="SELECT patient_fname,patient_lname,patient_id_no,
						   patient_phone,patient_dob,patient_sex 
					FROM referrals WHERE referral_id=\"$referral_id\"";

		}elseif($options==3){
			$query="SELECT from_hospital_name,from_hospital_id,physician_name,
					physician_phone,to_hospital_name,to_hospital_id,receive_department
					FROM referrals WHERE referral_id=\"$referral_id\"";

		}elseif($options==4){
			$query="SELECT to_hospital_name,to_hospital_id,receive_department 
					FROM referrals WHERE referral_id=\"$referral_id\"";

		}elseif($options==5){
			$query="SELECT transfer_reasons,tranfer_date,illness_history,
							patient_diagnostic,info_summary,hospital_admission_date,
							stay_length,mode_of_transport 
					FROM referrals WHERE referral_id=\"$referral_id\"";
		}elseif($options==6){
			$query="SELECT * FROM referral_attachments WHERE referral_id=\"$referral_id\"";
		}else{
			$result[0]="error";
		}

		//run query
		if($query!="error" && $query!=""){
			$result=$this->select($con,$query);
		}
		return $result;
	}

	//referral actions functions [DELETE AND UPDATE STATUS]
	public function referral_actions($options,$referral_id){
		global $con;
		$query="";
		$status;
		$options=(int)$options;
		if($options==1){
			$query="UPDATE referrals SET status='RECEIVED' 
				WHERE referral_id=\"$referral_id\"
				LIMIT 1";

		}elseif($options==2){
			$query="UPDATE referrals SET status='SCHEDULED'
				    WHERE referral_id=\"$referral_id\"
				    LIMIT 1";
		}elseif($options==3){
			$query="UPDATE referrals SET status='PENDING'
					WHERE referral_id=\"$referral_id\"
					LIMIT 1";

		}
		$status=$this->update($con,$query);
		return $status;
	}

	//function to check if referral has a counter referral
	public function hasCounterReferral($referral_id){
		global $con;
		$status;
		$query="SELECT referral_id FROM counter_referrals 
					   WHERE referral_id=\"$referral_id\"";
		$num=$this->rows($con,$query);
		if($num>0){
			$status=true;
		}else{
			$status=false;
		}

		return $status;
	}
	####################### END OF REFERRAL DETAILS ##########################

	######################## REFERRAL SELECT ACTION FOR TABS ##############

	//function to return referrals according to option passed
	public function get_referrals_by_status($option,$id_field,$field_name){
		global $con;
		$query="";
		$result=array();
		$allowed=array("from_hospital_id","to_hospital_id");
		$allowed_options=array(1,2,3);
		if(in_array($field_name, $allowed)){
			if(in_array($option, $allowed_options)){
				if($option==1){
					$query="SELECT * FROM referrals
							WHERE status='PENDING'
							AND ".$field_name."=".$id_field."
							ORDER BY referral_id DESC ";
				}elseif($option==2){
					$query="SELECT * FROM referrals
							WHERE status='SCHEDULED'
							AND ".$field_name."=".$id_field."
							ORDER BY referral_id DESC ";
				}elseif($option==3){
					$query="SELECT * FROM referrals
							WHERE status='RECEIVED'
							AND ".$field_name."=".$id_field."
							ORDER BY referral_id DESC ";
				}	
				$result=$this->select($con,$query);
			}else{
				$result[0]="error";
			}
		}else{
			$result[0]="error";
		}
		return $result;
	}
	public function search_incoming_ref($hospital_id,$option,$input){
		global $con;
		$query="SELECT * FROM referrals WHERE to_hospital_id=\"$hospital_id\"";
		if($option==1){
			$query.=" AND status=\"$input\"";
		}elseif($option==2){
			$query.=" AND referral_id=\"$input\"";
		}
		$query.="AND status!='DELETED' ORDER BY referral_id DESC";
		//return $query;
		return $this->select($con,$query);
	}
	public function get_system_referrals($option,$status,$hospital_id,$sent_date){
		global $con;
		$query="SELECT * FROM referrals";
		if($option==1){

		}elseif($option==2){
			$query.=" WHERE status=\"$status\"";
		}elseif($option==3){
			$query.=" WHERE from_hospital_id=\"$hospital_id\" OR to_hospital_id=\"$hospital_id\"";
		}elseif($option==4){
			$query.=" WHERE regDate=\"$sent_date\"";
		}
		$query.=" ORDER BY referral_id DESC";
		return $this->select($con,$query);
	}
	######################## END  REFERRAL SELECT ACTION FOR TABS ##############
	##################### SENDING COUNTER REFERRAL SECTION #######################

	//function to get referral counter referral
	public function get_counter_referral($referral_id){
		global $con;
		$query="SELECT * FROM counter_referrals
				WHERE referral_id=\"$referral_id\"
				LIMIT 1";
		$result=array();
		$result=$this->select($con,$query);

		return $result;
	}
	//function to create new counter referral id
	public function create_counter_referral_id(){
		global $con;
		$result=array();
		$id=0;
		$query="SELECT counter_ref_id FROM counter_referrals ORDER BY counter_ref_id DESC limit 1";
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$id=$value['counter_ref_id'];
		}
		$id=$id+1;
		return $id;
	}
	//function to save counter referrals
	public function save_counter_referral($counter_ref_id,$referral_id,$patient_name,$patient_surname,
											$patient_id_no,$patient_phone,$patient_dob,$patient_sex,
											$from_hospital_name,$from_hospital_id,$to_hospital_name, 
											$to_hospital_id,$physician_names,$physician_phone,
											$mode_of_transport,$receive_department,$hospital_admission_date,
											$stay_length,$transfer_date,$transfer_reasons,$patient_diagnostics,
											$illness_history,$past_medical,$info_summary,$recommendations){
		global $con;
		$query="INSERT INTO counter_referrals(counter_ref_id,referral_id,patient_name, patient_surname,
											patient_id_no,patient_phone,patient_dob,patient_sex,
											from_hospital_name,from_hospital_id,to_hospital_name, 
											to_hospital_id,physician_names,physician_phone, 
											mode_of_transport,receive_department,hospital_admission_date,
											stay_length,transfer_date,transfer_reasons,patient_diagnostics,
											illness_history,past_medical,info_summary,recommendations,status) 
				VALUES (\"$counter_ref_id\",\"$referral_id\",\"$patient_name\",\"$patient_surname\",
						\"$patient_id_no\",\"$patient_phone\",\"$patient_dob\",\"$patient_sex\",
						\"$from_hospital_name\",\"$from_hospital_id\",\"$to_hospital_name\", 
						\"$to_hospital_id\",\"$physician_names\",\"$physician_phone\",
						\"$mode_of_transport\",\"$receive_department\",\"$hospital_admission_date\",
						\"$stay_length\",\"$transfer_date\",\"$transfer_reasons\",\"$patient_diagnostics\",
						\"$illness_history\",\"$past_medical\",\"$info_summary\",\"$recommendations\",'PENDING')";
		$status=$this->insert($con,$query);

		return $status;
	}
##################### END OF COUNTER REFERRAL SECTION #######################
	#################### REFERRAL CHAT ###################################
	//get chats
	public function get_referral_chats($referral_id){
		global $con;
		$query="SELECT * FROM referral_chat
				WHERE referral_id=\"$referral_id\"
				ORDER BY message_id DESC
				LIMIT 20";
		$result=array();
		$result=$this->select($con,$query);

		return $result;
	}
	//function to save message
	public function save_message($referral_id,$sender_id,$message,$user_name,$user_type){
		global $con;
		$query="INSERT referral_chat(referral_id,sender_id,user_name,message,user_type,status)
				VALUES(\"$referral_id\",\"$sender_id\",\"$user_name\",\"$message\",\"$user_type\",'ACTIVE')";
		$status=$this->insert($con,$query);

		return $status;
	}
	//function to save chat notification
	public function save_chat_notification($referral_id,$sender_id,$sender_type,$from_hospital,$receive_hospital,$message){
		global $con;
		$query="INSERT INTO referral_chat_not(referral_id,sender_id,sender_type,from_hospital,receive_hospital,message,status)
		VALUES (\"$referral_id\",\"$sender_id\",\"$sender_type\",\"$from_hospital\",\"$receive_hospital\",\"$message\",'UNREAD')";
		$status=$this->insert($con,$query);
		return $status;
	}
	//function to remove referral chat message
	public function remove_message($message_id){
		global $con;
		$query="DELETE FROM referral_chat WHERE message_id=\"$message_id\"
				LIMIT 1";
		return $this->update($con,$query);
	}
	//get from hospital
	public function get_from_hospital($referral_id){
		global $con;
		$query="SELECT from_hospital_id FROM referrals WHERE referral_id=\"$referral_id\"
				LIMIT 1";
		$result=$this->select($con,$query);
		$from_hospital=0;
		foreach ($result as $key => $value) {
			$from_hospital=(int)$value['from_hospital_id'];
		}
		return $from_hospital;
	}
	public function get_receive_hospital($referral_id){
		global $con;
		$query="SELECT to_hospital_id FROM referrals WHERE referral_id=\"$referral_id\"
				LIMIT 1";
		$result=$this->select($con,$query);
		$to_hospital=0;
		foreach ($result as $key => $value) {
			$to_hospital=(int)$value['to_hospital_id'];
		}
		return $to_hospital;
	}
	//function to get chat sender notifications
	public function get_referral_chat_not($user_id,$hospital_id){
		global $con;
		$query="SELECT * FROM referral_chat_not
				WHERE sender_id!=\"$user_id\"
				AND (from_hospital=\"$hospital_id\" OR receive_hospital=\"$hospital_id\")
				ORDER BY notif_id DESC";
		$result=$this->select($con,$query);
		return $result;
	}
	################### END OF REFERRAL CHATS ##########################
	#######################COUNTER REFERRAL TAB #########################
	public function get_outgoing_counter_referral($hospital_id){
		global $con;
		$query="SELECT * FROM counter_referrals
				WHERE from_hospital_id=\"$hospital_id\"
				ORDER BY counter_ref_id DESC";
		$result=array();
		$result=$this->select($con,$query);
		return $result;
	}
	public function get_incoming_counter_referral($hospital_id){
		global $con;
		$query="SELECT * FROM counter_referrals
				WHERE to_hospital_id=\"$hospital_id\"
				ORDER BY counter_ref_id DESC";
		$result=array();
		$result=$this->select($con,$query);
		return $result;
	}

	//function to search counter referrals
	public function search_counter_referral($input){
		global $con;
		$query="";
		$check_input=(int)$input;
		if($check_input>0){
			$query="SELECT * FROM counter_referrals
					WHERE counter_ref_id=\"$check_input\"";
		}else{
			$query="SELECT * FROM counter_referrals
					WHERE patient_name LIKE \"%$input%\" OR patient_surname LIKE \"%$input%\" 
					OR (from_hospital_name LIKE \"%$input%\" OR to_hospital_name LIKE \"%$input%\")
					";
		}
		return $this->select($con,$query);
	}
	###################### END OF COUNTER REFERRAL TAB ##################

	##################### 	DELETE REFERRAL ##########################
	
	public function remove_referral($referral_id){
		global $con;
		$query="UPDATE referrals SET status='DELETED'
				WHERE referral_id=\"$referral_id\"
				LIMIT 1";
		$status=$this->update($con,$query);
		return $status;
	}
	##################### END DELETE REFERRAL ######################

	#################### GET PATIENT INFO ##########################
	public function get_patient_info($referral_id){
		global $con;
		$query="SELECT patient_fname,patient_lname,patient_id_no,
					   patient_phone,patient_dob,patient_sex 
					   FROM referrals
					   WHERE referral_id=\"$referral_id\"
					   LIMIT 1";
		$result=array();
		$result=$this->select($con,$query);
		return $result;
	}

	#################### END OF GET PATIENT INFO ####################

	################## GET RECEIVE DEPARTMENT ######################
	public function get_receive_department($id){
		global $con;
		$department_name="";
		$query="SELECT name FROM system_departments
				WHERE id=\"$id\" LIMIT 1";
		$result=array();
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$department_name=$value['name'];
		}

		return $department_name;
	}
	################## END OF GET RECEIVE DEPARTMENT ##############
	################## REFERRAL 
}
	
//instantiate class Referral
$referral=new Referral();
?>