<?php 
 //get hospital id from user sessions
require_once 'includes/database.inc.php';
include_once 'controllers/SuperAdmin.php';
//get the hospital id from hospital admin
$result=array();
$result=$super->get_doctors("*",0);
?>
<div id="div_table">
<table class="uk-table uk-table-nowrap table_check">
    <thead>
    <tr>
        <th class="uk-width-1-10 uk-text-center small_col"><input type="checkbox" data-md-icheck class="check_all"></th>
        <th class="uk-width-2-10">Profile</th>
        <th class="uk-width-2-10">Names</th>
        <th class="uk-width-2-10 uk-text-center">Email</th>
        <th class="uk-width-1-10 uk-text-center">Phone</th>
        <th class="uk-width-1-10 uk-text-center">Department</th>
        <th class="uk-width-2-10 uk-text-center">Status</th>
        <th class="uk-width-2-10 uk-text-center">Actions</th>
    </tr>
    </thead>
    <tbody>
        <?php 
        foreach ($result as $key => $value) {
            //display records
            ?>
        <tr>
            <td class="uk-text-center uk-table-middle small_col">
                <input type="checkbox" data-md-icheck class="check_row">
            </td>
            <td class="uk-text-center">
                <?php 
                //check if profile not equal null
                if($value['profile_image']!="null"){
                    ?>
                    <img class="md-user-image" src="system_images/profiles/<?php echo $value['profile_image'];?>" alt=""/>
                    <?php
                }else{
                    ?>
                    <img class="md-user-image" src="assets/img/avatars/avatar_01_tn.png" alt=""/>
                    <?php
                }
                ?>
            </td>
            <td><?php echo $value['names']; ?></td>
            <td class="uk-text-center">
                <?php echo $value['email']; ?>
            </td>
            <td class="uk-text-center">
                <?php echo $value['phone']; ?>
            </td>
            <td class="uk-text-center">
                <?php echo $value['department']; ?>
            </td>
            <td class="uk-text-center">
                <span class="uk-badge uk-badge-primary">
                    <?php echo $value['status']; ?>
                </span>
            </td>
            <td class="uk-text-center">
                <a class="btn_update"
                    status="<?php echo $value['status']; ?>"
                    action="<?php echo $value['doctor_id']; ?>"
                <?php
                 if($value['status']=="PENDING"){
                    ?>
                    data-uk-tooltip title="Activate This doctor"
                    <?php
                 }else{
                    ?>
                    data-uk-tooltip title="Desactivate This doctor"
                    <?php
                 }
                 ?> href="#"><i class="md-icon material-icons">&#xE254;</i></a>
                <a class="delete"
                action="<?php echo $value['doctor_id']; ?>" data-uk-tooltip title="Delete This doctor">
                    <font style="font-size: 18px;">
                        <i class="md-icon material-icons fa fa-trash-o"></i>
                    </font>
                    
                </a>
            </td>
        </tr>
            <?php
        }
        ?>

    </tbody>
</table>
</div>