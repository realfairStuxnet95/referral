<div class="uk-grid" data-uk-grid-margin>
	<div class="uk-width-medium-1-4">
		<a href="add_on_ref" class="uk-button uk-button-primary uk-button-large">
			CREATE REFERRAL
		</a>
	</div>
    <div class="uk-width-medium-1-4">
        <select id="select_status" class="md-input" data-uk-tooltip="{pos:'top'}" title="Filter with Status">
            <option value="" disabled selected hidden>Filter Status</option>
            <option value="PENDING">PENDING</option>
            <option value="SENT">SENT</option>
            <option value="RECEIVED">RECEIVED</option>
        </select>
    </div>
	 <div class="uk-width-1-2">
		<div class="uk-input-group">
		    <input id="txt_search" type="text" class="md-input" placeholder="Search Referral by number,patient info" />
		    <span class="uk-input-group-addon">
		        <a id="link_search" data-uk-tooltip="{pos:'top'}" title="Search By Referral Number"><i class="fa fa-search"></i></a>
		    </span>
		</div>
	 </div>
</div>