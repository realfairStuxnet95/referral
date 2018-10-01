<?php 
if(isset($_GET['key'])){
$key=$_GET['key'];
$details=array();
$details=$super->get_blog_details($key);
}else{
    ?>
    <script type="text/javascript">
        window.location="dashboard?action=system_blog";
    </script>
    <?php
}
?>
<div class="md-card">
    <div class="md-card-content">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <form id="frm_update" method="POST">
                <div class="uk-form-row">
                    <?php 
                    foreach ($details as $key => $value) {
                        ?>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <label>Blog Title</label>
                            <input id="blog_title" name="blog_title" value="<?php echo $value['blog_title']; ?>"   
                             type="text" class="md-input" />
                        </div>
                        <div class="uk-width-medium-1-1" style="margin: 10px;">
                            <label>Blog Category</label>
                            <select id="blog_category" class="md-input">
                                <option value="BLOG">BLOG</option>
                            </select>
                        </div>
                        <div class="uk-width-medium-1-1" style="margin: 10px;">
                            <label>Description.</label>
                            <textarea id="description" name="description" cols="30" rows="6" class="md-input no_autosize"><?php echo $value['description']; ?></textarea>
                        </div>
                        <div class="uk-width-medium-1-1" style="margin: 10px;">
                            <select id="blog_tags" data-md-selectize  data-md-selectize-bottom>
                                <option value="">Tags</option>
                                <option value="News">News</option>
                                <option value="Article">Article</option>
                                <option value="Public">Public</option>
                            </select> 
                        </div>
                        <div class="uk-width-medium-1-1">
                            <label>Media Embed(<i>Optional</i>)</label>
                            <input id="blog_embed" name="blog_embed" value="<?php echo $value['embed']; ?>" type="text" class="md-input" />
                        </div>
                        <h3 class="heading_a" style="margin:10px;">
                            <span class="sub-heading">
                            Select blog Posters
                            </span>
                        </h3>
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <div data-uk-tooltip title="Supported formats:JPG,JPEG,GIF,PNG" class="uk-form-file md-btn md-btn-primary">
                                    Select Images
                                    <input id="form-file" type="file" name="images[]" multiple required>
                                    <span id="selected"></span>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-1" style="margin: 10px;">
                                <input type="hidden" name="blog_id" id="blog_id" value="<?php echo $value['blog_id']; ?>">
                                <button type="submit" class="md-btn md-btn-large md-btn-success">SAVE BLOG</button>
                            </div>
                        </div>
                    </div>
                        <?php
                    }
                    ?>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/actions/ajax_modals.js"></script> 
<script src="assets/js/super/blog.js"></script> 