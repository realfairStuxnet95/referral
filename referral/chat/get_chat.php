<?php
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
		//get from hospital id from referral id
		$from_hospital=$referral->get_from_hospital($referral_id);
		$receive_hospital=$referral->get_receive_hospital($referral_id);
		$save_status=$referral->save_message($referral_id,$sender_id,$message,$user_name,$user_type);
		if($save_status){
			//save chat notification
			$notification=$user_name.' Added comment on referral Says:<p>'.$message.'</p>';
			$save_notif=$referral->save_chat_notification($referral_id,$sender_id,$user_type,$from_hospital,$receive_hospital,$notification);
			if($save_notif){
				get_chats($referral_id,$referral,$function);
			}else{
				echo "System Error Please contact Administrators".mysqli_error($con);
			}
		}
	}elseif($action=="remove_message"){
		$message_id=$function->sanitize($data[1]);
		$referral_id=$function->sanitize($data[2]);
		$remove_status=$referral->remove_message($message_id);
		if($remove_status){
			get_chats($referral_id,$referral,$function);
		}else{
			echo mysqli_error($con);
		}
	}
}else{
	echo 'error';
}

function get_chats($referral_id,$referral,$function){
	$current_user=$_SESSION['user_id'];
		$result=$referral->get_referral_chats($referral_id);
		if(count($result)>0){
			?>
				<ul class="chat_message" style="list-style: none;">
					<?php 
					foreach ($result as $key => $value) {
						?>
			                <li>
			                	
			                    <p style="background: #2196F3;padding: 10px;border-radius: 5px;color: #fff;font-size: 14px;">
			                    	<a class="chat_message_time" style="color: orange;font-weight: bold;">
			                    		<?php echo $value['user_name']; ?>
			                    	</a><br>
			                    	<?php echo $value['message'] ?><br>
			                        <span class="chat_message_time">
			                        	<em style="color: yellow;font-size: 12px;">
			                        		<?php echo $function->formatDate($value['regDate']); ?>
			                        	</em>
			                    	</span>
			                    	<?php 
			                    	if($current_user==$value['sender_id']){
			                    		?>
				                    	<button action="<?php echo $value['message_id']; ?>" class="md-btn md-btn-flat md-btn-flat-warning md-btn-mini btn_remove_comment"  data-uk-tooltip title="Delete comment">
				                    		<i class="fa fa-close"></i>
				                    	</button>
			                    		<?php
			                    	}
			                    	?>
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
<script type="text/javascript">
	$(".btn_remove_comment").click(function(){
		var action=$(this).attr("action");
		var requestUrl="get_chats";
		var data=[];
		var outputDiv=$("#chat_output");
		var loader=$("li.loader");
		data[0]="remove_message";
		data[1]=action;
		data[2]=referral_id;
		if(confirm("Do you Really want to Delete This message")){
			loadChats(requestUrl,data,outputDiv,loader);
		}
	});
	function loadChats(url,data,outputPlace,showLoader){
		showLoader.show();
		$.post(url,{
			info:data
		},function(data){
			showLoader.hide();
			outputPlace.html(data);
		});
	}
</script>