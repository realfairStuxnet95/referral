<?php
$notif_counter=12; 
if($user_type=="doctor"){
    $hospital_id=$doctor->get_doctor_hospital_id($user_id);
    $notifications=$referral->get_referral_chat_not($user_id,$hospital_id);
    $notif_counter=count($notifications);
}
?>
<li data-uk-dropdown="{mode:'click',pos:'bottom-right'}" aria-haspopup="true" aria-expanded="false">
    <a href="#" class="user_action_icon">
        <i class="material-icons md-24 md-light"></i>
        <?php 
        if($notif_counter>0){
            ?>
            <span class="uk-badge">
                <?php echo $notif_counter; ?>
            </span>
            <?php
        }
        ?>
    </a>
    <div class="uk-dropdown uk-dropdown-xlarge" aria-hidden="true">
        <div class="md-card-content">
            <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#header_alerts',animation:'slide-horizontal'}">
                <li class="uk-width-1-2 uk-active" aria-expanded="true"><a href="#" class="js-uk-prevent uk-text-small">Referral chat</a></li>
                <li class="uk-width-1-2" aria-expanded="false"><a href="#" class="js-uk-prevent uk-text-small">Alerts (4)</a></li>
            <li class="uk-tab-responsive uk-active uk-hidden" aria-haspopup="true" aria-expanded="false"><a>Messages (12)</a><div class="uk-dropdown uk-dropdown-small" aria-hidden="true"><ul class="uk-nav uk-nav-dropdown"></ul><div></div></div></li></ul>
            <ul id="header_alerts" class="uk-switcher uk-margin">
                <li aria-hidden="false" class="uk-active">
                    <ul class="md-list md-list-addon">
                        <?php 
                        if(count($notifications)>0){
                            foreach ($notifications as $key => $value) {
                                $doctor_names=$doctor->get_doctor_names($value['sender_id']);
                                $doctor_profile=$doctor->getProfile($value['sender_id']);
                                ?>
                                <li>
                                    <?php 
                                    if($doctor_profile!=""){
                                        ?>
                                        <div class="md-list-addon-element">
                                            <img class="md-user-image md-list-addon-avatar" src="<?php echo $doctor_profile; ?>" alt="">
                                        </div>
                                        <?php
                                    }else{
                                        ?>
                                        <div class="md-list-addon-element">
                                            <span class="md-user-letters md-bg-cyan">
                                                <?php echo substr($doctor_names, 0,1) ?>
                                            </span>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <div class="md-list-content">
                                        <span class="md-list-heading"><a href="page_mailbox.html">
                                            <?php 
                                            echo $doctor_names;
                                            ?>
                                        </a></span>
                                        <span class="uk-text-small uk-text-muted">
                                            <?php 
                                            echo $value['message'];
                                            ?>
                                        </span>
                                    </div>
                                </li>
                                <?php
                            }
                        }else{
                            ?>
                            <div class="uk-text-center uk-margin-top uk-margin-small-bottom">
                                <a href="#" class="md-btn md-btn-flat md-btn-flat-primary js-uk-prevent">NO NEW NOTIFICATIONS ADDED !!!</a>
                            </div>
                            <?php
                        }
                        ?>
                    </ul>
                    <div class="uk-text-center uk-margin-top uk-margin-small-bottom">
                        <a href="page_mailbox.html" class="md-btn md-btn-flat md-btn-flat-primary js-uk-prevent">Show All</a>
                    </div>
                </li>
                <li aria-hidden="true">
                    <ul class="md-list md-list-addon">
                        <li>
                            <div class="md-list-addon-element">
                                <i class="md-list-addon-icon material-icons uk-text-warning"></i>
                            </div>
                            <div class="md-list-content">
                                <span class="md-list-heading">Et molestias ut.</span>
                                <span class="uk-text-small uk-text-muted uk-text-truncate">Qui rerum sequi eos doloremque non ut odit.</span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-addon-element">
                                <i class="md-list-addon-icon material-icons uk-text-success"></i>
                            </div>
                            <div class="md-list-content">
                                <span class="md-list-heading">Omnis consequuntur corrupti.</span>
                                <span class="uk-text-small uk-text-muted uk-text-truncate">Reprehenderit suscipit enim est aspernatur rem occaecati.</span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-addon-element">
                                <i class="md-list-addon-icon material-icons uk-text-danger"></i>
                            </div>
                            <div class="md-list-content">
                                <span class="md-list-heading">Omnis sit rem.</span>
                                <span class="uk-text-small uk-text-muted uk-text-truncate">Impedit corporis dolores pariatur occaecati laboriosam.</span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-addon-element">
                                <i class="md-list-addon-icon material-icons uk-text-primary"></i>
                            </div>
                            <div class="md-list-content">
                                <span class="md-list-heading">Ducimus culpa voluptates.</span>
                                <span class="uk-text-small uk-text-muted uk-text-truncate">Autem sapiente ipsa aut quo sequi.</span>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</li>