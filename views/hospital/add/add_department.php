<div class="row">
<div class="col-lg-12">
 <div class="uk-width-1-1">
<button class="uk-button uk-button-primary uk-button-large" data-uk-modal="{target:'#modal_overflow'}">ADD NEW DEPARTMENT
</button>
<div id="modal_overflow" class="uk-modal">
    <div class="uk-modal-dialog">
        <button type="button" class="uk-modal-close uk-close"></button>
        <h2 class="heading_a">Fill form to add new department</h2>
                <form id="frm_reg_dep">
	            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <div class="uk-form-row">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                        <label>Department Name</label>
                                        <select id="name" class="md-input">
                                        <?php 
                                        $result=array();
                                        $result=$admin->get_system_deparments();
                                        foreach ($result as $key => $value) {
                                            ?>
                                            <option value="<?php echo $value['id']; ?>">
                                               <?php echo $value['name']; ?> 
                                            </option>
                                            <?php
                                        }
                                        ?>  
                                        </select>
                                    </div>
                                    <div class="uk-width-medium-1-1">
                                        <label>Deparment Description</label>
                                        <textarea id="description" name="description" type="text" class="md-input"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                            	<input type="hidden" id="hos_id" name="hos_id" value="<?php echo $_SESSION['user_id'];?>">
                                <CENTER><input type="submit" class="uk-button uk-button-primary uk-button-large" value="SAVE DEPARTMENT" /></CENTER>
                                <p>
                                	<center><img id="loading" src="assets/img/loading.gif" style="width: 100px;height:auto;display: none;"></center>
                                </p>
                                <p id="errors" style="background: #dd4422;color: #fff;border-radius: 10px;padding: 10px;display: none;">test error</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</form>
        </div>
    </div>
</div>
</div>
</div>
