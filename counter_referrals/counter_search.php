<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['info'])){
		include '../class_loader.php';
		$data=$_POST['info'];
		$counter_referrals=array();
		$hos_id="";
		$input="";
		$user_id=$_SESSION['user_id'];
		$user_type=$_SESSION['user_type'];
		if($user_type=="doctor"){
	    //get doctor assigned hospital
	    $hos_id=$doctor->get_doctor_hospital_id($user_id);
	    }
	    //get input
	    $input=$function->sanitize($data[0]);
		$counter_referrals=$referral->search_counter_referral($input);
		displayResult($counter_referrals,$function,$hos_id);
	}else{
		echo "Please check submitted data";
	}
}else{
	echo "500";
}
function displayResult($counter_referrals,$function,$hos_id){
	?>
<div class="md-card">
        <div class="md-card-content">
            <div style="margin: 0px;" class="uk-grid" data-uk-grid-margin>
                 <div class="uk-width-medium-1-2">
                    <div class="uk-input-group">
                        <input id="txt_search" type="text" class="md-input" placeholder="To search by number use search button not enter....." />
                        <span class="uk-input-group-addon">
                            <a class="search"><i class="fa fa-search"></i></a>
                        </span>
                    </div>
                 </div>
            </div>
    </div>
</div>
<table class="uk-table uk-table-nowrap table_check uk-table-hover">
    <thead style="background: #F5F5F5;">
    <tr>
    	<th class="uk-width-1-10 uk-text-center">Number</th>
        <th class="uk-width-1-10 uk-text-center">Date</th>
        <th class="uk-width-2-10">Patient Info</th>
        <th class="uk-width-2-10 uk-text-center">Referring Provider</th>
        <th class="uk-width-1-10 uk-text-center">Receiving Provider</th>
        <th class="uk-width-2-10 uk-text-center">Status</th>
        <th class="uk-width-2-10 uk-text-center">Actions</th>
    </tr>
    </thead>
    <tbody>
	<?php
	if(count($counter_referrals)>0){
		foreach ($counter_referrals as $key => $value) {
			if($value['from_hospital_id']==$hos_id OR $value['to_hospital_id']==$hos_id){
			?>
	        <tr>
	        	<td>
	        		<?php echo $value['counter_ref_id']; ?>
	        	</td>
	            <td class="uk-text-center">
	            <div>
	                <div class="md-card-content">
	                    <p>
	                        <a href="view_referral?key=<?php echo $value['referral_id'] ?>&title=<?php echo $value['patient_fname'] ?>">
	                        <?php echo $function->formatDate($value['regDate']); ?>
	                    </a>
	                    </p>
	                </div>
	            </div>
	            </td>
	            <td class="uk-text-center">
	                <a style="text-decoration: none;color: #333;" href="view_referral?key=<?php echo $value['referral_id'] ?>&title=<?php echo $value['patient_name'] ?>">
	                <div class="md-card-content">
	                <p>
	                    <font style="font-weight: bold;">Names:</font> 
	                         <font style="color: #0077cc;">
	                            <?php echo $value['patient_name'].' '.$value['patient_surname']; ?>
	                        </font>
	                </p>
	                <p>
	                    <font style="font-weight: bold;">Telephone:</font> 
	                        <?php echo $value['patient_phone']; ?>
	                </p>
	                <p>
	                    <font style="font-weight: bold;">ID NO:</font>
	                     <?php echo $value['patient_id_no']; ?>
	                </p>
	                </div>
	            </a>
	            </td>
	            <td>
	                <a style="text-decoration: none;color: #333;" href="view_referral?key=<?php echo $value['referral_id'] ?>&title=<?php echo $value['patient_fname'] ?>">
	                <div class="md-card-content">
	                    <p>
	                        <font style="font-weight: bold;">
	                        Physician Names:
	                        </font>
	                        <?php echo $value['physician_names']; ?>
	                    </p>
	                    <p>
	                        <font style="font-weight: bold;">
	                            Physician Phone:
	                        </font>
	                            <?php echo $value['physician_phone']; ?>
	                    </p>
	                    <p>
	                        <font style="font-weight: bold;">From Hospital:</font>
	                        <?php echo $value['from_hospital_name']; ?>
	                    </p>
	                </div>
	            </a>
	            </td>
	            <td>
	                <a style="text-decoration: none;color: #333;" href="view_referral?key=<?php echo $value['referral_id'] ?>&title=<?php echo $value['patient_fname'] ?>">
	                    <div class="md-card-content">
	                        <p>
	                            <font style="font-weight: bold;">
	                                To hospital:
	                            </font>
	                            <?php echo $value['to_hospital_name']; ?>
	                        </p>
	                        <p>
	                            <font style="font-weight: bold;">
	                                Mode of Transport:
	                            </font>
	                            <?php echo $value['mode_of_transport']; ?>
	                        </p>
	                        <p>
	                            <font style="font-weight: bold;">
	                                Admission Date:
	                            </font>
	                            <?php echo $value['hospital_admission_date']; ?>
	                        </p>
	                    </div>
	                </a>
	            </td>
	            <td>
	                <div>
	                    <div class="md-card-content">
	                        <p>
	                            <span class="uk-badge uk-badge-warning">
	                                <?php echo $value['status']; ?>
	                            </span>
	                        </p>
	                    </div>
	                </div>
	            </td>
	        </tr> 
			<?php
			}
		}
	}else{
		?>
	    <div class="uk-alert uk-alert-danger" data-uk-alert>
	        <a href="#" class="uk-alert-close uk-close"></a>
	        no counter referral available now
	    </div>
		<?php
	}
}
?>
<script src="assets/js/loader/post_loader.js"></script>
<script src="counter_referrals/js/counter_search.js"></script>