<head>
  <title>Exporting Referral Information</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2>Exporting Table Information</h2>
  		<p>
  			You can Use The Below Button To Export Information According To your Preferred Output Format.
  		</p>
<?php
$output='';
if(isset($_GET['action'])){
	require '../../../module_loader.php';
	$action=$function->sanitize($_GET['action']);
	if($action=='referral'){
		if(isset($_GET['hospital']) && isset($_GET['status'])){
			$hospital=(int)$function->sanitize($_GET['hospital']);
			//get scheduled referrals from this hospital
			$referrals=$referral->search_incoming_ref($hospital,1,'SCHEDULED');
			?>
            <table id="example" class="table table-bordered" style="width:100%">
                <thead style="background: #F5F5F5;">
                <tr>
                    <th>#</th>
                    <th>Issue Date</th>
                    <th>Patient Info</th>
                    <th>Referring Provider</th>
                    <th>Department</th>
                    <th>Doctor</th>
                    <th>Referral Info</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach ($referrals as $key => $value) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $value['referral_id']; ?>
                        </td>
                        <td>
                            <a href="view_referral?key=<?php echo $value['referral_id'] ?>&title=<?php echo $value['patient_fname'] ?>">
                            <?php echo $function->formatDate($value['regDate']); ?>
                            </a>
                        </td>
                        <td>
                            <a href="view_referral?key=<?php echo $value['referral_id'] ?>&title=<?php echo $value['patient_fname'] ?>" style="color:#333;">
                            	<p>
                                	<font style="font-weight: bold;">Names:</font> 
                                     <font style="color: #0077cc;">
                                        <?php echo $value['patient_fname'].' '.$value['patient_lname']; ?>
                                    </font>
                            	</p>
                            	<p>
	                                <?php 
	                                if($value['patient_phone']!=''){
	                                    ?>
	                                        <?php 
	                                        echo 'Phone: '.$value['patient_phone'];
	                                        ?>
	                                    <?php
	                                }else{
	                                    ?>
	                                        <?php 
	                                        echo 'Guardian: '.$value['guardian'].' / Tel :'.$value['guardian_phone'];
	                                        ?>
	                                    <?php
	                                }
	                                ?>
                            	</p>
                            </a>
                        </td>
                        <td>
                            <a href="view_referral?key=<?php echo $value['referral_id'] ?>&title=<?php echo $value['patient_fname'] ?>">
                                <font style="color: #333;">
                                    <?php
                                     echo 'From: <b>'.$value['from_hospital_name'].'</b>'; 
                                    ?>
                                </font>
                                <br>
                                    <?php echo 'Physician:'.$value['physician_name'].'<br>Tel:'.$value['physician_phone']; ?>
                            </a>
                        </td>
                        <td>
                        	<?php 
                        	$info=$referral->get_scheduledReferral_info($value['referral_id']);
                        	foreach ($info as $key => $i) {
                        		echo $admin->get_department_name($i['receive_department']);
                        	}
                        	?>
                        </td>
                        <td>
                        	<?php 
                        	$info=$referral->get_scheduledReferral_info($value['referral_id']);
                        	foreach ($info as $key => $i) {
                        		echo $admin->get_doctor_names($i['receive_doctor']);
                        	}
                        	?>
                        </td>
                        <td>
                            <?php 
                            if($value['status']=="SCHEDULED"){
                                $info=$referral->get_scheduledReferral_info($value['referral_id']);
                                if(count($info)>0){
                                    foreach ($info as $key => $i) {
                                        ?>
                                            <?php 
                                            echo 'Scheduled Date: <b>'.$i['date_time'].'</b>';
                                            echo '<br>Scheduled Department: <b>'.$admin->get_department_name($i['receive_department']).'</b>';
                                            echo '<br>Scheduled Doctor: <b>'.$admin->get_doctor_names($i['receive_doctor']).'</b>';
                                            ?>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr> 
                    
                    <?php
                }
                ?>
                </tbody>
            </table>
			<?php
		}else{
			echo "Cannot Export";
		}
	}
}else{
	echo "Error:Contact system admin";
}
  // header('Content-Type: application/xls');
  // header('Content-Disposition: attachment; filename=download.xls');
?>
	</div>
</body>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<style type="text/css">
	thead input {
        width: 100%;
    }
</style>
<script type="text/javascript">
$(document).ready(function(){
    var table=$('#example').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    // Setup - add a text input to each footer cell
    $('#example thead tr').clone(true).appendTo('#example thead');
    $('#example thead tr:eq(1) th').each(function(i){
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Search '+title+'" />' );
 
        $('input', this).on('keyup change', function(){
            if ( table.column(i).search() !== this.value){
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
});
</script>