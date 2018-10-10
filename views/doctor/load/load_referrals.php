<?php 
require_once 'module_loader.php';
//get the hospital id from hospital admin
$user_id=$_SESSION['user_id'];
$user_type=$_SESSION['user_type'];
if($user_type=="doctor"){
    //get doctor assigned hospital
    $hos_id=$doctor->get_doctor_hospital_id($user_id);
}elseif($user_type=$_SESSION['nurse']){

}
$referrals=$referral->ongoing_referrals($hos_id);
?>
<table class="uk-table uk-table-nowrap table_check uk-table-hover">
    <thead style="background: #F5F5F5;">
    <tr>
        <th class="uk-width-1-10 uk-text-center">#</th>
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
         if(count($referrals)>0){
            foreach ($referrals as $key => $value) {
                ?>
                <tr>
                    <td>
                        <?php echo $value['referral_id']; ?>
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
                        <a style="text-decoration: none;color: #333;" href="view_referral?key=<?php echo $value['referral_id'] ?>&title=<?php echo $value['patient_fname'] ?>">
                        <div class="md-card-content">
                        <p>
                            <font style="font-weight: bold;">Names:</font> 
                                 <font style="color: #0077cc;">
                                    <?php echo $value['patient_fname'].' '.$value['patient_lname']; ?>
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
                                <?php echo $value['physician_name']; ?>
                            </p>
                            <p>
                                <font style="font-weight: bold;">
                                    Physician Phone:
                                </font>
                                    <?php echo $value['physician_phone']; ?>
                            </p>
                            <p>
                                <font style="font-weight: bold;">From Hospital:</font>
                                <?php echo $value['physician_phone']; ?>
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
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <a href="view_referral?key=<?php echo $value['referral_id'] ?>&title=<?php echo $value['patient_fname'] ?>" class="uk-button uk-button-success">
                            <i class="fa fa-eye"></i>
                        </a>
                        <?php 
                        $status=$value['status'];
                        if($status=="PENDING"){
                            ?>
                            <a action="<?php echo $value['referral_id']; ?>" class=" delete uk-button uk-button-danger">
                                <i class="fa fa-trash-o"></i>
                            </a>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <?php
            }
         }else{
            ?>
            <div class="uk-alert uk-alert-danger" data-uk-alert>
                <a href="#" class="uk-alert-close uk-close"></a>
                no ongoing referral available you can create it now
            </div>
            <?php
            }
        ?>
    </tbody>
</table>