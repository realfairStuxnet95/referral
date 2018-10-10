<?php 
 //get hospital id from user sessions
//get the hospital id from hospital admin
$hos_id=$user->get_user_hospital_id($_SESSION['user_id']);
$doctors=array();
$doctors=$admin->get_nurses($hos_id);
?>

<table class="uk-table uk-table-nowrap table_check">
    <thead>
    <tr>
        <th class="uk-width-1-10 uk-text-center small_col"><input type="checkbox" data-md-icheck class="check_all"></th>
        <th class="uk-width-2-10">Profile</th>
        <th class="uk-width-2-10">Names</th>
        <th class="uk-width-2-10 uk-text-center">Email</th>
        <th class="uk-width-1-10 uk-text-center">Phone</th>
        <th class="uk-width-2-10 uk-text-center">Status</th>
        <th class="uk-width-2-10 uk-text-center">Actions</th>
    </tr>
    </thead>
    <tbody>
        <?php 
        foreach ($doctors as $key => $value) {
            //display records
            ?>
        <tr>
            <td class="uk-text-center uk-table-middle small_col">
                <input type="checkbox" data-md-icheck class="check_row">
            </td>
            <td class="uk-text-center">
                <?php 
                //check if profile not equal null
                if($value['profile_image']!=""){
                    ?>
                    <img class="md-user-image" src="system_images/profiles/doctors/<?php echo $value['profile_image'];?>" alt=""/>
                    <?php
                }else{
                    ?>
                    <img class="md-user-image" src="assets/img/avatars/nurse.png" alt="" style="max-height: 35px;" />
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
                <span class="uk-badge uk-badge-primary">
                    <?php echo $value['status']; ?>
                </span>
            </td>
            <td class="uk-text-center">
                <a href="#" class="delete" action="<?php echo $value['nurse_id']; ?>" data-uk-tooltip title="Delete Nurse">
                    <i class="md-icon material-icons">delete</i>
                </a>
            </td>
        </tr>
            <?php
        }
        ?>

    </tbody>
</table>