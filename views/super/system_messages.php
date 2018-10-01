<?php

$res=array();
$res=$super->get_system_messages();
?>
<title>System Notifications.</title>
<div id="top_bar">
    <div class="md-top-bar">
        <ul id="menu_top" class="uk-clearfix">
            <li class="uk-hidden-small">
                <a href="dashboard">
                    <i class="material-icons">&#xE88A;</i>
                </a>
            </li>
            <li class="uk-hidden-small">
                <a href="#" data-uk-tooltip  data-uk-modal="{target:'#modal_overflow'}" title="Add new Message">
                    <i class="material-icons  fa fa-edit"></i>
                </a>
            </li>
            <li class="uk-hidden-small">
                        <div class="uk-width-medium-1-3">
                            <div id="modal_overflow" class="uk-modal" style="margin-top: 40px;">
                                <div class="uk-modal-dialog">
                                    <button type="button" class="uk-modal-close uk-close"></button>
                                    <h2 class="heading_a">Add new System Messages</h2>
<div class="md-card">
    <div class="md-card-content">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <div class="uk-form-row">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <label>Message Title</label>
                            <input id="title" type="text" class="md-input" />
                        </div>
                        <div class="uk-width-medium-1-1" style="margin: 10px;">
                            <label>Message Category</label>
                            <select id="category" class="md-input">
                                <option value="NOTIFICATION">NOTIFICATION</option>
                                <option value="ALERT">ALERT</option>
                                <option value="MESSAGE">MESSAGE</option>
                            </select>
                        </div>
                        <div class="uk-width-medium-1-1" style="margin: 10px;">
                            <label>Target Users</label>
                            <select id="target" class="md-input">
                                <option value="*">All</option>
                                <?php 
                                $users=array();
                                $users=$super->get_users_types();
                                foreach ($users as $key => $value) {
                                    ?>
                                    <option value="<?php echo $value['id']; ?>">
                                        <?php echo $value['type']; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                <div class="uk-width-medium-1-1" style="margin: 10px;">
                    <label>Description.</label>
                    <textarea id="description" cols="30" rows="6" class="md-input no_autosize"></textarea>
                </div>
        <div class="uk-grid">
            <div class="uk-width-medium-1-1" style="margin: 10px;">
                <button id="btn_save" class="md-btn md-btn-large md-btn-success">SAVE Message</button>
            </div>
        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                                </div>
                            </div>
                        </div>
                <a href="dashboard?action=system_messages" data-uk-tooltip title="Refresh Message Posts">
                    <i class="material-icons  fa fa-refresh"></i>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="md-card">
    <div class="md-card-content">
        <div class="uk-grid" data-uk-grid-margin="">
            <div class="uk-width-medium-3-10">
                <label for="product_search_name">Message Title</label>
                <input type="text" class="md-input" id="product_search_name">
            </div>
            <div class="uk-width-medium-3-10">
                <div class="uk-margin-small-top">
                    <select class="md-input">
                        <option>Select status</option>
                        <option value="PENDING">PENDING</option>
                        <option value="ACTIVE">ACTIVE</option>
                    </select>
                </div>
            </div>
            <div class="uk-width-medium-1-10">
                <div class="uk-margin-top uk-text-nowrap">
                    <input type="checkbox" name="product_search_active" id="product_search_active" data-md-icheck/>
                    <label for="product_search_active" class="inline-label">Active</label>
                </div>
            </div>
            <div class="uk-width-medium-2-10 uk-text-center">
                <a href="#" class="md-btn md-btn-primary uk-margin-small-top">Filter</a>
            </div>
        </div>
    </div>
</div>

<div class="md-card">
    <div class="md-card-content">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-1-1">
                <div class="uk-overflow-container">
                    <?php 
                    if(count($res)>0){
                        ?>
                    <table class="uk-table uk-text-nowrap">
                        <thead>
                            <tr>
                                <th>Poster</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            foreach ($res as $key => $value) {
                                ?>
                            <tr>
                                <td>
                                    <?php
                                    $url="";
                                    if($value['category']=="NOTIFICATION"){
                                        $url="assets/system_icons/alerts/notification.png";
                                    }else{
                                        $url="assets/system_icons/alerts/warning.png";
                                    }
                                    ?>
                                    <img  class="img_thumb" src="<?php echo $url; ?>" alt="">
                                </td>
                                <td class="uk-text-large uk-text-nowrap">
                                    <a href="#">
                                        <?php echo $value['title']; ?>
                                    </a>
                                </td>
                                <td class="uk-text-nowrap">
                                    <?php echo $value['category']; ?>
                                </td>
                                <td class="uk-text-nowrap">
                                    <?php 
                                        if($value['status']=="INACTIVE"){
                                            ?>
                                            <span class="uk-badge uk-badge-danger">
                                            <?php echo $value['status']; ?>
                                            </span>
                                            <?php
                                        }elseif($value['status']=="ACTIVE"){
                                            ?>
                                            <span class="uk-badge uk-badge-success">
                                            <?php echo $value['status']; ?>
                                            </span>
                                            <?php  
                                        }
                                    ?>
                                </td>
                                <td></td>
                                <td class="uk-text-nowrap">
                                    <a class="delete" action="<?php echo $value['ann_id']; ?>" href="#" data-uk-tooltip title="Delete" class="uk-margin-left">
                                        <i class="material-icons md-24">&#xE872;</i>
                                    </a>
                                </td>
                            </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                        <?php
                    }else{
                        ?>
                            <div class="uk-alert uk-alert-danger" data-uk-alert>
                                <a href="#" class="uk-alert-close uk-close"></a>
                                No system notification or announcement found....
                            </div>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/actions/ajax_modals.js"></script> 
<script src="assets/js/super/notification.js"></script> 