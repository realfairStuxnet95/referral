<?php 
$locations=array();
$locations=$super->get_hospitals_deparments();
?>
<div id="top_bar">
    <div class="md-top-bar">
        <ul id="menu_top" class="uk-clearfix">
            <li class="uk-hidden-small">
                <a href="#" data-uk-modal="{target:'#modal_overflow'}" data-uk-tooltip title="Add Department">
                    <i class="material-icons fa fa-plus"></i>
                </a>
            </li>
            <li class="uk-hidden-small">
            <div class="uk-width-medium-1-3">
                <div id="modal_overflow" class="uk-modal" style="margin-top: 40px;">
                    <div class="uk-modal-dialog">
                        <button type="button" class="uk-modal-close uk-close"></button>
                        <h2 class="heading_a">Add new Hospital Departments</h2>
                        <div class="md-card">
                        <div class="md-card-content">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                        <div class="uk-form-row">
                                            <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <label>Department title</label>
                                            <input id="title" name="title" type="text" class="md-input" />
                                        </div>
                                        <div class="uk-width-medium-1-1" style="margin: 10px;">
                                            <label>Description.</label>
                                            <textarea id="description" name="description" cols="30" rows="3" class="md-input no_autosize"></textarea>
                                        </div>
                                        <div class="uk-grid">
                                            <div class="uk-width-medium-1-1" style="margin: 10px;">
                                                <button id="btn_save" class="md-btn md-btn-large md-btn-success">
                                                SAVE Department
                                                </button>
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
            </li>
        </ul>
    </div>
</div>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="uk-overflow-container">
            <table class="uk-table">
                <thead>
                <tr>
                    <th>Department ID</th>
                    <th>Department</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach ($locations as $key => $value) {
                    ?>
                <tr>
                    <td><?php echo $value['id']; ?></td>
                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo $value['description']; ?></td>
                    <td><?php echo $value['status']; ?></td>
                    <td>
                        <a href="#" data-uk-tooltip title="Edit">
                            <i class="material-icons">edit</i>
                        </a>
                        <a class="delete" action="<?php echo $value['id']; ?>" data-uk-tooltip title="Delete">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
                    <?php
                }
                ?>


                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/actions/ajax_modals.js"></script> 
<script src="assets/js/super/departments.js"></script>