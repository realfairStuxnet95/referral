<?php 
//get the hospital id from hospital admin
$hos_id=$user->get_user_hospital_id($_SESSION['user_id']);
//gett department of a hospital
$result=array();
$result=$admin->load_department($hos_id);
?>
<table class="uk-table uk-table-condensed table_check">
    <thead>
    <tr>
        <th class="uk-width-2-10">Department</th>
        <th class="uk-width-2-10 uk-text-center">Description</th>
        <th class="uk-width-1-10 uk-text-center">Status</th>
        <th class="uk-width-2-10 uk-text-center">Actions</th>
    </tr>
    </thead>
    <tbody>
        <?php 
         foreach ($result as $key => $value) {
           ?>
        <tr>
            <td class="uk-text-center">
                <?php 
                //get department name
                echo $admin->get_department_name($value['name']); 
                ?>
                    
                </td>
            <td class="uk-text-center"><?php echo $value['description']; ?></td>
            <td class="uk-text-center"><span class="uk-badge uk-badge-primary">
                <?php echo $value['status']; ?>
            </span></td>
            <td class="uk-text-center">
                <a class="delete" action="<?php echo $value['department_id']; ?>">
                    <i class="md-icon material-icons">delete</i>
                </a>
            </td>
        </tr>
           <?php
         }
         ?>

    </tbody>
</table>