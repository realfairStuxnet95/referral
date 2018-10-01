<div class="uk-grid" data-uk-grid-margin>
 <div class="uk-width-1-2">
<button class="uk-button uk-button-danger uk-button-large">EXPORT PDF</button>
</div>
 <div class="uk-width-1-2">
<div class="uk-input-group">
    <label>Search Doctors by hospital,their info or departments</label>
    <input id="txt_search" type="text" class="md-input" />
    <span class="uk-input-group-addon">
        <a href="#"><i class="fa fa-search"></i></a>
    </span>
</div>
 </div>
</div>
<div class="md-card">
    <div class="md-card-content">
<div style="margin: 0px;" class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-4">
            <select id="select_department" class="md-input" data-uk-tooltip="{pos:'left'}" title="Filter with department">
            <option value="" disabled selected hidden>Filter department</option>
            <?php 
            $departments=array();
            $departments=$super->get_departments("*",0);
            foreach ($departments as $key => $value) {
                ?>
                <option value="<?php echo $value['department_id']; ?>">
                    <?php echo $value['name']; ?>
                </option>
                <?php
            }
            ?>
            </select>
        </div>
        <div class="uk-width-medium-1-4">
            <select id="select_hospitals" class="md-input" data-uk-tooltip="{pos:'left'}" title="Filter with Hospitals">
            <option value="" disabled selected hidden>Filter Hospitals</option>
            <?php 
            $hospitals=array();
            $hospitals=$super->get_hospitals("*",0);
            foreach ($hospitals as $key => $value) {
                ?>
                <option value="<?php echo $value['hospital_id'];?>">
                    <?php echo $value['hospital_name']; ?>
                </option>
                <?php
            }
            ?>
            </select>
        </div>
        <div class="uk-width-medium-1-4">
            <select id="select_status" class="md-input" data-uk-tooltip="{pos:'left'}" title="Filter with Status">
                <option value="" disabled selected hidden>Filter Status</option>
                <option value="PENDING">PENDING</option>
                <option value="ACTIVATED">ACTIVATED</option>
            </select>
        </div>
        <div class="uk-width-medium-1-4">
            <BUTTON class="uk-button uk-button-primary uk-button-large">
                <i class="fa fa-refresh"></i>
            </BUTTON>
        </div>
    </div>
</div>
</div>