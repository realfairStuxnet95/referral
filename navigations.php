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
                
                <div class="uk-navbar-flip">
                    <ul class="uk-navbar-nav user_actions">
                        <li><a href="#" id="full_screen_toggle" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">&#xE5D0;</i></a></li>
                        <?php 
                        include 'views/nav/notifications.php';
                        ?>
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