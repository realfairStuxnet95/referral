<?php
include_once 'controllers/Referral.inc.php';
include_once 'controllers/Hospital.inc.php';
//include_once 'controllers/User.inc.php';
include_once 'controllers/HospitalAdmin.php';
include_once 'controllers/Doctor.php';
require_once 'includes/database.inc.php';
require_once 'auth.php';
$notifications="";
$user_id=$_SESSION['user_id'];
$user_type=$_SESSION['user_type'];
?>
  <header id="header_main">
        <div class="header_main_content">
            <nav class="uk-navbar">               
                <!-- main sidebar switch -->
                <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                    <span class="sSwitchIcon"></span>
                </a>
                <!-- secondary sidebar switch -->
                <a href="#" style="display: none;" id="sidebar_secondary_toggle" class="sSwitch sSwitch_right sidebar_secondary_check">
                    <span class="sSwitchIcon"></span>
                </a>
                    <div style="display: none;" id="menu_top_dropdown" class="uk-float-left uk-hidden-small">
                        <div class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}">
                            <a href="#" class="top_menu_toggle"><i class="material-icons md-24">&#xE8F0;</i></a>
                            <div class="uk-dropdown uk-dropdown-width-3">
                                <div class="uk-grid uk-dropdown-grid">
                                    <div class="uk-width-2-3">
                                        <div class="uk-grid uk-grid-width-medium-1-3 uk-margin-bottom uk-text-center">
                                            <a href="page_mailbox.html" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-light-green-600">&#xE158;</i>
                                                <span class="uk-text-muted uk-display-block">Mailbox</span>
                                            </a>
                                            <a href="page_invoices.html" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-purple-600">&#xE53E;</i>
                                                <span class="uk-text-muted uk-display-block">Invoices</span>
                                            </a>
                                            <a href="page_chat.html" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-cyan-600">&#xE0B9;</i>
                                                <span class="uk-text-muted uk-display-block">Chat</span>
                                            </a>
                                            <a href="page_scrum_board.html" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-red-600">&#xE85C;</i>
                                                <span class="uk-text-muted uk-display-block">Scrum Board</span>
                                            </a>
                                            <a href="page_snippets.html" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-blue-600">&#xE86F;</i>
                                                <span class="uk-text-muted uk-display-block">Snippets</span>
                                            </a>
                                            <a href="page_user_profile.html" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-orange-600">&#xE87C;</i>
                                                <span class="uk-text-muted uk-display-block">User profile</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="uk-width-1-3">
                                        <ul class="uk-nav uk-nav-dropdown uk-panel">
                                            <li class="uk-nav-header">Components</li>
                                            <li><a href="components_accordion.html">Accordions</a></li>
                                            <li><a href="components_buttons.html">Buttons</a></li>
                                            <li><a href="components_notifications.html">Notifications</a></li>
                                            <li><a href="components_sortable.html">Sortable</a></li>
                                            <li><a href="components_tabs.html">Tabs</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <div class="uk-navbar-flip">
                    <ul class="uk-navbar-nav user_actions">
                        <li><a href="#" id="full_screen_toggle" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">&#xE5D0;</i></a></li>
                        <li style="display: none;"><a href="#" id="main_search_btn" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE8B6;</i></a></li>
                        <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                            <a href="#" class="user_action_icon">
                                <?php 
                                //get hospital notifications
                                 if($user_type!="SuperAdmin"){
                                    $hospital_id=$hospital->get_user_hospital($user_id,$user_type);
                                    $notifications=$referral->hospital_notifications($hospital_id);
                                 }
                                ?>
                                <i class="material-icons md-24 md-light">&#xE7F4;</i>
                                    <?php 
                                    if($notifications>0){
                                        ?>
                                        <span class="uk-badge uk-badge-warning">
                                        <?php echo $notifications; ?>   
                                        </span>
                                        <?php
                                        
                                    }
                                    ?>
                            </a>
                            <div class="uk-dropdown uk-dropdown-xlarge">
                                <div class="md-card-content">
                                    <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#header_alerts',animation:'slide-horizontal'}">
                                        <li class="uk-width-1-2 uk-active"><a href="#" class="js-uk-prevent uk-text-small">REFERRAL NOTIFICATIONS</a></li>
                                        <li class="uk-width-1-2"><a href="#" class="js-uk-prevent uk-text-small">Alerts (4)</a></li>
                                    </ul>
                                    <ul id="header_alerts" class="uk-switcher uk-margin">
                                        <li>
                                            <ul class="md-list md-list-addon">
                                                <?php 
                                //get hospital notifications
                                 if($user_type!="SuperAdmin"){
                                    $hospital_id=$hospital->get_user_hospital($user_id,$user_type);
                                    $notificationsList=$referral->get_latest_notifications($hospital_id);
                                    if(count($notificationsList)>0){
                                        ?>

                                        <?php
                                    }else{
                                        echo "not notifications available";
                                    }
                                 }
                                                ?>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <span class="md-user-letters md-bg-cyan">ku</span>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="page_mailbox.html">Incidunt beatae.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Deleniti a autem officia non.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <img class="md-user-image md-list-addon-avatar" src="assets/img/avatars/avatar_07_tn.png" alt=""/>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="page_mailbox.html">Accusantium ut qui.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Dolor harum voluptatem et totam maxime modi.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <span class="md-user-letters md-bg-light-green">nu</span>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="page_mailbox.html">Facilis distinctio.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Dicta unde reiciendis dolorum animi quod officia quasi.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <img class="md-user-image md-list-addon-avatar" src="assets/img/avatars/avatar_02_tn.png" alt=""/>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="page_mailbox.html">Amet quo.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Vel similique nulla aut ducimus aspernatur.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <img class="md-user-image md-list-addon-avatar" src="assets/img/avatars/avatar_09_tn.png" alt=""/>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="page_mailbox.html">Similique nihil.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Explicabo blanditiis maxime ullam blanditiis reprehenderit earum est sapiente explicabo ipsum.</span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="uk-text-center uk-margin-top uk-margin-small-bottom">
                                                <a href="page_mailbox.html" class="md-btn md-btn-flat md-btn-flat-primary js-uk-prevent">Show All</a>
                                            </div>
                                        </li>
                                        <li>
                                            <ul class="md-list md-list-addon">
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-warning">&#xE8B2;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Occaecati aut.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Voluptatum nobis voluptatum rem quo eos odit.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-success">&#xE88F;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Nulla eveniet.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Autem deleniti aut autem quia consequatur.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-danger">&#xE001;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Commodi provident.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Voluptatibus blanditiis est reiciendis alias molestiae eum qui recusandae.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-primary">&#xE8FD;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Dolores voluptates odit.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Impedit illo nesciunt et ut veniam.</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                            <a href="#" class="user_action_image">
                                <?php 
                                $user_type=$_SESSION['user_type'];
                                $profile="";
                                if($user_type=="doctor"){
                                    $profile=$doctor->getProfile($_SESSION['user_id']);
                                    ?>
                                <img style="min-height: 35px;" class="md-user-image" src="<?php echo $profile; ?>" alt=""/>
                                    <?php
                                }elseif($user_type=="SuperAdmin"){
                                    ?>
                                <img style="min-height: 35px;" class="md-user-image" src="assets/img/avatars/user.png" alt=""/>
                                    <?php
                                }elseif($user_type=="HospitalAdmin"){
                                    $profile_image=$admin->get_profile_image($user_id);
                                    if($profile_image!="" && $profile_image!='null'){
                                        ?>
                                        <img style="min-height: 35px;" class="md-user-image" src="system_images/profiles/<?php echo $profile_image; ?>" alt=""/>
                                        <?php
                                    }else{
                                        ?>
                                        <img style="min-height: 35px;" class="md-user-image" src="assets/img/avatars/user.png" alt=""/>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                ?>
                                <?php
                                ?>

                            </a>
                            <div class="uk-dropdown uk-dropdown-small">
                                <ul class="uk-nav js-uk-prevent">
                                    <li><a href="profile">My profile</a></li>
                                    <li>
                                        <?php
                                        $redirectUrl="";
                                        if($user_type=="SuperAdmin"){
                                            $redirectUrl="dashboard?action=system_settings";
                                        }elseif($user_type=="HospitalAdmin"){
                                            $redirectUrl="dashboard?action=hospital_settings";
                                        }else{
                                            $redirectUrl="";
                                        }
                                        if($redirectUrl!=""){
                                            ?>
                                            <a href="<?php echo $redirectUrl; ?>">Settings</a>
                                            <?php
                                        }
                                        ?>
                                        
                                    </li>
                                    <li><a href="logout">Log Out</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="header_main_search_form">
            <i class="md-icon header_main_search_close material-icons">&#xE5CD;</i>
            <form class="uk-form uk-autocomplete" data-uk-autocomplete="{source:'data/search_data.json'}">
                <input type="text" class="header_main_search_input" />
                <button class="header_main_search_btn uk-button-link"><i class="md-icon material-icons">&#xE8B6;</i></button>
                <script type="text/autocomplete">

                </script>
            </form>
        </div>
    </header>