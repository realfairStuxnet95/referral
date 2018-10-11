<div class="uk-grid" data-uk-grid-margin>
	<div class="uk-width-medium-1-2">
        <select id="select_from_hos" class="md-input" data-uk-tooltip="{pos:'top'}" title="Filter with Status">
            <option value="" disabled selected hidden>Filter From Hospital</option>
            <option value="PENDING">PENDING</option>
            <option value="SENT">SENT</option>
            <option value="RECEIVED">RECEIVED</option>
        </select>
	</div>
	 <div class="uk-width-1-2">
		<div class="uk-input-group">
		    <input id="txt_incoming" type="text" class="md-input" placeholder="Search Referral by number,patient info" />
		    <span class="uk-input-group-addon">
		        <a id="incoming_search" data-uk-tooltip="{pos:'top'}" title="Search By Referral Number"><i class="fa fa-search"></i></a>
		    </span>
		</div>
	 </div>
</div>