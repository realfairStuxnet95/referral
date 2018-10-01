<?php 
$res=array();
$res=$super->get_blogs();
?>
<div id="top_bar">
    <div class="md-top-bar">
        <ul id="menu_top" class="uk-clearfix">
            <li class="uk-hidden-small">
                <a href="home">
                    <i class="material-icons">&#xE88A;</i>
                </a>
            </li>
            <li class="uk-hidden-small">
                <a href="#" data-uk-tooltip  data-uk-modal="{target:'#modal_overflow'}" title="Add new Blog Post">
                    <i class="material-icons fa fa-edit"></i>
                </a>
            </li>
            <li class="uk-hidden-small">
                        <div class="uk-width-medium-1-3">
                            <div id="modal_overflow" class="uk-modal" style="margin-top: 40px;">
                                <div class="uk-modal-dialog">
                                    <button type="button" class="uk-modal-close uk-close"></button>
                                    <h2 class="heading_a">Add new Blog Content</h2>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <div class="uk-form-row">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                        <label>Blog Title</label>
                                        <input id="blog_title" type="text" class="md-input" />
                                    </div>
                                    <div class="uk-width-medium-1-1" style="margin: 10px;">
                                        <label>Blog Category</label>
                                        <select id="blog_category" class="md-input">
                                            <option value="BLOG">BLOG</option>
                                        </select>
                                    </div>
                            <div class="uk-width-medium-1-1" style="margin: 10px;">
                                <label>Description.</label>
                                <textarea id="description" cols="30" rows="6" class="md-input no_autosize"></textarea>
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
                                        <input id="blog_embed" type="text" class="md-input" />
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
                                <input id="form-file" type="file" multiple>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-1" style="margin: 10px;">
                            <button id="btn_save" class="md-btn md-btn-large md-btn-success">SAVE BLOG</button>
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
                <a href="dashboard?action=system_blog" data-uk-tooltip title="Refresh Blog Posts">
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
                <label for="product_search_name">Blog Title</label>
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
                                    if($value['file_name']!=""){
                                        ?>
                                        <img class="img_thumb" src="system_images/blog/<?php echo $value['file_name'];?>" alt="">
                                        <?php
                                    }else{
                                        ?>
                                        <img class="img_thumb" src="https://cdn2.iconfinder.com/data/icons/communication-141/48/news-512.png">
                                        <?php
                                    }
                                    ?>
                                    
                                </td>
                                <td class="uk-text-large uk-text-nowrap">
                                    <a href="dashboard?action=update_blog&key=<?php echo $value['blog_id']; ?>">
                                        <?php echo $value['blog_title']; ?>
                                    </a>
                                </td>
                                <td class="uk-text-nowrap">
                                    <?php echo $value['category']; ?>
                                </td>
                                <td class="uk-text-nowrap">
                                    <?php 
                                        if($value['status']=="PENDING"){
                                            ?>
                                            <span class="uk-badge uk-badge-warning">
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
                                    <a class="view" action="<?php echo $value['blog_id']; ?>"  href="dashboard?action=update_blog&key=<?php echo $value['blog_id']; ?>">
                                    <i class="material-icons">edit</i>
                                    </a>
                                    <a class="delete" action="<?php echo $value['blog_id']; ?>" href="#" data-uk-tooltip title="Delete Blog" class="uk-margin-left">
                                        <i class="material-icons md-24">&#xE872;</i>
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
    </div>
</div>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/actions/ajax_modals.js"></script> 
<script src="assets/js/super/blog.js"></script> 