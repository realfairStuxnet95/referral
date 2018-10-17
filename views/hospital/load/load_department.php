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
        <th>#</th>
        <th>Department</th>
        <th>Description</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
        <?php 
         foreach ($result as $key => $value) {
           ?>
            <tr>
                <td>
                    <img class="md-user-image" src="assets/img/avatars/department.png" alt="" style="max-height: 35px;" />
                </td>
                <td>
                    <?php 
                    //get department name
                    echo $admin->get_department_name($value['name']); 
                    ?>
                        
                    </td>
                <td><?php echo $value['description']; ?></td>
                <td><span class="uk-badge uk-badge-primary">
                    <?php echo $value['status']; ?>
                </span></td>
                <td>
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