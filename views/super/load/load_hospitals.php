<?php 
 //get hospital id from user sessions
require_once 'includes/database.inc.php';
include_once 'includes/Functions.php';
include_once 'controllers/SuperAdmin.php';
include_once 'controllers/User.inc.php';
$result=array();
if(isset($_GET['initial']) && isset($_GET['option'])){
        $options=$_GET['option'];

        $allowed=array('*','PENDING','ACTIVATED');
        if(in_array($options,$allowed)){
           $result=$super->get_hospitals($_GET['option'],$_GET['initial']); 
       }else{
        $result=$super->get_hospitals("*",0);
       }   
}else{
    $result=$super->get_hospitals("*",0);
}
?>
<table class="uk-table uk-table-nowrap table_check">
    <thead>
    <tr>
        <th class="uk-width-1-10 uk-text-center small_col"><input type="checkbox" data-md-icheck class="check_all"></th>
        <th class="uk-width-1-10 uk-text-center">Hospital code</th>
        <th class="uk-width-2-10">Hospital</th>
        <th class="uk-width-2-10 uk-text-center">Director Names</th>
        <th class="uk-width-1-10 uk-text-center">Status</th>
        <th class="uk-width-2-10 uk-text-center">Actions</th>
    </tr>
    </thead>
    <tbody>
        <?php
        if(count($result)>0){
         foreach ($result as $key => $value) {
           ?>
        <tr>
            <td class="uk-text-center uk-table-middle small_col">
                <input type="checkbox" data-md-icheck class="check_row">
            </td>
            <td><?php echo $value['hospital_code']; ?></td>
            <td class="uk-text-center"><?php echo $value['hospital_name']; ?></td>
            <td class="uk-text-center"><?php echo $value['director_name']; ?></td>
            <td class="uk-text-center"><span class="uk-badge uk-badge-primary">
                <?php echo $value['status']; ?>
            </span></td>
            <td class="uk-text-center">
                <a class="edit" status="<?php echo $value['status']; ?>" action="<?php echo $value['hospital_id']; ?>" data-uk-tooltip title="
                    <?php 
                    if($value['status']=="PENDING"){
                        echo 'Activate Hospital';
                    }else if($value['status']=="ACTIVATED"){
                        echo 'Desactivate Hospital';
                    }
                    ?>
                    " href="#"><i class="md-icon material-icons">&#xE254;</i></a>
                <a class="delete" href="#" action="<?php echo $value['hospital_id']; ?>">
                    <font style="font-size: 18px;color: red;">
                    <i class="md-icon material-icons fa fa-trash-o"></i>
                    </font>
                </a>
            </td>
        </tr>
           <?php
         }
         ?>
            <?php
        }else{
            echo "no hospitals available";
        }
        ?>
    </tbody>
</table>