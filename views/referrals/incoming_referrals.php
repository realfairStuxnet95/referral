<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require '../../class_loader.php';
    $data=$_POST['info'];
    $user_id=$_SESSION['user_id'];
    $user_type=$_SESSION['user_type'];
    $action=$function->sanitize($data[0]);
    if($user_type=="doctor"){
        $hospital_id=$doctor->get_doctor_hospital_id($user_id);
    }else{
        $hospital_id=0;
    }
    if($action=="select"){
        $field_name='to_hospital_id';
        $option=$function->sanitize($data[1]);
        if($option=='PENDINGS'){
            displayResult($referral,$admin,$function,$hospital_id,1,'PENDING');
        }elseif($option=='SCHEDULED'){
            displayResult($referral,$admin,$function,$hospital_id,1,$option);
        }elseif($option=='RECEIVED'){
            displayResult($referral,$admin,$function,$hospital_id,1,$option);
        }elseif($option=='ASSIGNED'){
            $doctor_id=$function->sanitize($data[2]);
            displayResult($referral,$admin,$function,$doctor_id,3,$option);
        }
    }elseif($action=="search"){
        $input=$function->sanitize($data[1]);
        displayResult($referral,$admin,$function,$hospital_id,2,$input);
    }
}else{
    echo "500";
}

function displayResult($referral,$admin,$function,$hospital_id,$option,$input){
    $referrals=$referral->search_incoming_ref($hospital_id,$option,$input);
    include 'util/incoming.php';
    if(count($referrals)>0){
        ?>
        <div class="md-card uk-margin-medium-bottom">
            <a href="export_excel?action=referral&hospital=<?php echo $hospital_id ?>&status=SCHEDULED" name="Scheduled" class="uk-button uk-button-success" style="margin: 10px;" target="_blank">EXPORT CONTENT</a>
            <table id="example" class="uk-table uk-text-nowrap" style="overflow: scroll;">
                <thead style="background: #F5F5F5;">
                <tr>
                    <th>#</th>
                    <th>Actions</th>
                    <th>Issue Date</th>
                    <th>Patient Info</th>
                    <th>Referring Provider</th>
                    <th>Status</th>
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

                            <?php 
                            $status=$value['status'];
                            if($status!=""){
                                ?>
                                <a href="view_referral?key=<?php echo $value['referral_id'] ?>&title=<?php echo $value['patient_fname'] ?>" class="uk-button uk-button-success" data-uk-tooltip title="Viewing referral">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a status="<?php echo $status; ?>" action="<?php echo $value['referral_id']; ?>" data-uk-modal="{target:'#modal_overflow'}" class="uk-button uk-button-primary updateStatus" data-uk-tooltip title="Update Referral Status">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <?php 
                                include 'util/modal.php';
                                ?>
                                <?php
                            }elseif($status=="SENDING"){
                              ?>
                            <a class="md-btn" data-uk-tooltip title="Update Referral Status">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a class="md-btn disabled">
                                <i class="fa fa-trash-o"></i>
                            </a>
                              <?php  
                            }
                            ?>
                        </td>
                        <td>
                            <a href="view_referral?key=<?php echo $value['referral_id'] ?>&title=<?php echo $value['patient_fname'] ?>">
                            <?php echo $function->formatDate($value['regDate']); ?>
                            </a>
                        </td>
                        <td>
                            <a href="view_referral?key=<?php echo $value['referral_id'] ?>&title=<?php echo $value['patient_fname'] ?>" style="color:#333;">
                                <font style="font-weight: bold;">Names:</font> 
                                     <font style="color: #0077cc;">
                                        <?php echo $value['patient_fname'].' '.$value['patient_lname']; ?>
                                    </font>
                                    <br>
                                <?php 
                                if($value['patient_phone']!=''){
                                    ?>
                                    <span class="uk-badge uk-badge-primary">
                                        <?php 
                                        echo 'Phone: '.$value['patient_phone'];
                                        ?>
                                    </span>
                                    <?php
                                }else{
                                    ?>
                                    <span class="uk-badge uk-badge-primary">
                                        <?php 
                                        echo 'Guardian: '.$value['guardian'].' / Tel :'.$value['guardian_phone'];
                                        ?>
                                    </span>
                                    <?php
                                }
                                ?>
                            </a>
                        </td>
                        <td>
                            <a href="view_referral?key=<?php echo $value['referral_id'] ?>&title=<?php echo $value['patient_fname'] ?>">
                                <font style="color: #333;">
                                    <?php
                                     echo 'From: <b>'.$value['from_hospital_name'].'</b>'; 
                                    ?>
                                </font>
                                <span class="uk-badge uk-badge-success">
                                    <?php echo 'Physician:'.$value['physician_name'].'<br>Tel:'.$value['physician_phone']; ?>
                                </span>
                            </a>
                        </td>
                        <td>
                            <a href="view_referral?key=<?php echo $value['referral_id'] ?>&title=<?php echo $value['patient_fname'] ?>">
                                <?php 
                                $status=$value['status'];
                                if($status=="PENDING"){
                                    ?>
                                <span class="uk-badge uk-badge-warning">
                                    <?php echo $value['status']; ?>
                                </span>
                                    <?php
                                }elseif($status=="RECEIVED"){
                                    ?>
                                    <span class="uk-badge uk-badge-success">
                                        <?php echo $value['status']; ?>
                                    </span>
                                    <?php
                                }elseif($status=="SCHEDULED"){
                                    ?>
                                    <span class="uk-badge uk-badge-info">
                                        <?php echo $value['status']; ?>
                                    </span>
                                    <?php
                                }
                                ?>
                            </a>
                        </td>
                        <td>
                            <?php 
                            if($value['status']=="SCHEDULED"){
                                $info=$referral->get_scheduledReferral_info($value['referral_id']);
                                if(count($info)>0){
                                    foreach ($info as $key => $i) {
                                        ?>
                                        <span class="uk-badge uk-badge-primary">
                                            <?php 
                                            echo 'Scheduled Date: <b>'.$i['date_time'].'</b>';
                                            echo '<br>Scheduled Department: <b>'.$admin->get_department_name($i['receive_department']).'</b>';
                                            echo '<br>Scheduled Doctor: <b>'.$admin->get_doctor_names($i['receive_doctor']).'</b>';
                                            ?>
                                        </span>
                                        <?php
                                    }
                                }
                            }elseif($value[''])
                            ?>
                        </td>
                    </tr> 
                    
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <?php
    }else{
        include 'util/no_incoming.php';
    }
}
?>

<script src="assets/js/actions/ajax_modals.js"></script>
<script src="scripts/referral/incoming.js"></script>
<script src="assets/js/actions/ref.js"></script>