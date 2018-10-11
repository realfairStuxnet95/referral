<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="uk-overflow-container">
        	<div id="outputDiv">
        		
        	</div>
        </div>
    </div>
</div>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/loader/post_loader.js"></script>
<script src="assets/js/super/hospitals.js"></script>
<script type="text/javascript">
$(function(){
	var requestUrl="hospital_search";
	var data=[];
	var output=$("#outputDiv");
	var loaderMsg="please wait...";

	data[0]="get_referrals";
	data[1]="1";
	loadData(requestUrl,data,output,loaderMsg);
});
</script>