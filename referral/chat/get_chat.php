<?php
sleep(2);
$data=$_POST['info'];
if(is_array($data)){
	include '../../class_loader.php';
	$action=$function->sanitize($data[0]);
	$referral_id=$function->sanitize($data[1]);
	$result=array();
	if($action=="get_chats"){
		get_chats($referral_id,$referral,$function);
	}elseif($action=="save_chat"){
		$referral_id=$function->sanitize($data[1]);
		$message=$function->sanitize($data[2]);
		$sender_id=$function->sanitize($data[3]);
		$user_type=$function->sanitize($data[4]);
		$user_name=$function->sanitize($data[5]);
		$save_status=$referral->save_message($referral_id,$sender_id,$message,$user_name,$user_type);
		if($save_status){
			get_chats($referral_id,$referral,$function);
		}
	}
}else{
	echo 'error';
}

function get_chats($referral_id,$referral,$function){
		$result=$referral->get_referral_chats($referral_id);
		if(count($result)>0){
			?>
				<ul class="chat_message" style="list-style: none;">
					<?php 
					foreach ($result as $key => $value) {
						?>
			                <li>
			                	
			                    <p style="background: #0066cc;padding: 10px;border-radius: 20px;color: #fff;font-size: 14px;">
			                    	<a class="chat_message_time" style="color: orange;font-weight: bold;">
			                    		<?php echo $value['user_name']; ?>
			                    	</a><br>
			                    	<?php echo $value['message'] ?><br>
			                        <span class="chat_message_time">
			                        	<em style="color: yellow;font-size: 12px;">
			                        		<?php echo $function->formatDate($value['regDate']); ?>
			                        	</em>
			                    	</span>
			                    </p>
			                </li>
						<?php
					}
					?>
                </ul>
			<?php
		}else{
			?>
            <div class="uk-alert uk-alert-danger" data-uk-alert>
                <a href="#" class="uk-alert-close uk-close"></a>
                No comment on this referral found.
            </div>
			<?php
		}
}
?>