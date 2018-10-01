
<div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>
    <a href="dashboard?action=hospitals" style="cursor: pointer;">
    <div>
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-float-right uk-margin-top uk-margin-small-right">
                    <i style="font-size: 44px;" class="fa fa-h-square" aria-hidden="true"></i>
                </div>
                <span class="uk-text-muted uk-text-small">Hospitals</span>
                <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $super->get_table_rows("hospitals"); ?></noscript></span></h2>
            </div>
        </div>
    </div>
    </a>
    <a href="dashboard?action=doctors" style="cursor: pointer;">
    <div>
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-float-right uk-margin-top uk-margin-small-right">
                    <i style="font-size: 44px;" class="fa fa-user-md" aria-hidden="true"></i>
                </div>
                <span class="uk-text-muted uk-text-small">Doctors</span>
                <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $super->get_table_rows("doctors"); ?></noscript></span></h2>
            </div>
        </div>
    </div>
    </a>
    <a href="dashboard?action=hospitals" style="cursor: pointer;">
    <div>
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-float-right uk-margin-top uk-margin-small-right">
                    <i style="font-size: 44px;" class="fa fa-user" aria-hidden="true"></i>
                </div>
                <span class="uk-text-muted uk-text-small">Nurses</span>
                <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $super->get_table_rows("nurses"); ?></noscript></span></h2>
            </div>
        </div>
    </div>
    </a>
    <a href="dashboard?action=hospitals" style="cursor: pointer;">
    <div>
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-float-right uk-margin-top uk-margin-small-right">
                    <i style="font-size: 44px;" class="fa fa-users" aria-hidden="true"></i>
                </div>
                <span class="uk-text-muted uk-text-small">Receptionists</span>
                <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $super->get_table_rows("receptionists"); ?></noscript></span></h2>
            </div>
        </div>
    </div>
    </a>
    <a href="dashboard?action=hospitals" style="cursor: pointer;">
    <div>
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-float-right uk-margin-top uk-margin-small-right">
                    <i style="font-size: 44px;" class="fa fa-user-plus" aria-hidden="true"></i>
                </div>
                <span class="uk-text-muted uk-text-small">Hopital Admins</span>
                <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $super->get_table_rows("system_users"); ?></noscript></span></h2>
            </div>
        </div>
    </div>
    </a>
    <a href="dashboard?action=hospitals" style="cursor: pointer;">
    <div>
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-float-right uk-margin-top uk-margin-small-right">
                    <i style="font-size: 44px;" class="fa fa-file-text"></i>
                </div>
                <span class="uk-text-muted uk-text-small">Referrals</span>
                <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $super->get_table_rows("referrals"); ?></noscript></span></h2>
            </div>
        </div>
    </div>
    </a>
    <a href="dashboard?action=hospitals" style="cursor: pointer;">
    <div>
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-float-right uk-margin-top uk-margin-small-right">
                    <i style="font-size: 44px;" class="fa fa-file-text-o"></i>
                </div>
                <span class="uk-text-muted uk-text-small">Counter Referrals</span>
                <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $super->get_table_rows("counter_referrals"); ?></noscript></span></h2>
            </div>
        </div>
    </div>
    </a>
    <a href="dashboard?action=hospitals" style="cursor: pointer;">
    <div>
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-float-right uk-margin-top uk-margin-small-right">
                    <i style="font-size: 44px;" class="fa fa-paperclip"></i>
                </div>
                <span class="uk-text-muted uk-text-small">Referrals Files</span>
                <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $super->get_table_rows("referral_attachments"); ?></noscript></span></h2>
            </div>
        </div>
    </div>
    </a>

    <a href="dashboard?action=system_blog" style="cursor: pointer;">
        <div>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-float-right uk-margin-top uk-margin-small-right">
                        <i style="font-size: 44px;" class="fa fa-newspaper-o"></i>
                    </div>
                    <span class="uk-text-muted uk-text-small">Blog Articles</span>
                    <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $super->get_table_rows("system_blog"); ?></noscript></span></h2>
                </div>
            </div>
        </div>
    </a>
    <a href="dashboard?action=system_messages" style="cursor: pointer;">
        <div>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-float-right uk-margin-top uk-margin-small-right">
                        <i style="font-size: 44px;" class="fa fa-warning"></i>
                    </div>
                    <span class="uk-text-muted uk-text-small">System Notification</span>
                    <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $super->get_table_rows("system_announcements"); ?></noscript></span></h2>
                </div>
            </div>
        </div>
    </a>
    <a href="dashboard?action=region" style="cursor: pointer;">
        <div>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-float-right uk-margin-top uk-margin-small-right">
                        <i style="font-size: 44px;" class="fa fa-map"></i>
                    </div>
                    <span class="uk-text-muted uk-text-small">Hospital Location</span>
                    <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $super->get_table_rows("hospital_regions"); ?></noscript></span></h2>
                </div>
            </div>
        </div>
    </a>
    <a href="dashboard?action=category" style="cursor: pointer;">
        <div>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-float-right uk-margin-top uk-margin-small-right">
                        <i style="font-size: 44px;" class="fa fa-reorder"></i>
                    </div>
                    <span class="uk-text-muted uk-text-small">Hospitals Categories</span>
                    <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $super->get_table_rows("hospitals_category"); ?></noscript></span></h2>
                </div>
            </div>
        </div>
    </a>
    <a href="dashboard?action=departments" style="cursor: pointer;">
        <div>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-float-right uk-margin-top uk-margin-small-right">
                        <i style="font-size: 44px;" class="fa fa-tags"></i>
                    </div>
                    <span class="uk-text-muted uk-text-small">Hospitals Departments</span>
                    <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $super->get_table_rows("system_departments"); ?></noscript></span></h2>
                </div>
            </div>
        </div>
    </a>
    <a href="dashboard?action=transport" style="cursor: pointer;">
        <div>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-float-right uk-margin-top uk-margin-small-right">
                        <i style="font-size: 44px;" class="fa fa-ambulance"></i>
                    </div>
                    <span class="uk-text-muted uk-text-small">Transport Mode</span>
                    <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $super->get_table_rows("transport_mode"); ?></noscript></span></h2>
                </div>
            </div>
        </div>
    </a>
</div>