    <!-- main header -->
    <header id="header_main">
        <div class="header_main_content">
            <nav class="uk-navbar">
                                    <div class="main_logo_top">
                        <a href="dashboard"><img src="assets/img/logo/logo.png" alt="" height="15" width="41"/></a>
                    </div>
                                
                <!-- secondary sidebar switch -->
                <a href="#" id="sidebar_secondary_toggle" class="sSwitch sSwitch_right sidebar_secondary_check">
                    <span class="sSwitchIcon"></span>
                </a>
                
                <div class="uk-navbar-flip">
                    <ul class="uk-navbar-nav user_actions">
                        <li><a href="#" id="full_screen_toggle" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">&#xE5D0;</i></a></li>
                        <li><a href="#" id="main_search_btn" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE8B6;</i></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="header_main_search_form">
            <i class="md-icon header_main_search_close material-icons">&#xE5CD;</i>
            <form class="uk-form uk-autocomplete" data-uk-autocomplete="{source:'data/search_data.json'}">
                <input type="text" class="header_main_search_input" />
                <button class="header_main_search_btn uk-button-link"><i class="md-icon material-icons">&#xE8B6;</i></button>
            </form>
        </div>
    </header>
    <!-- main header end -->
<div id="top_bar">
    <div class="md-top-bar">
        <ul id="menu_top" class="uk-clearfix">
            <li class="uk-hidden-small">
                <a href="system_blog" data-uk-tooltip title="Blog List">
                    <i class="material-icons fa fa-home"></i>
                </a>
            </li>
            <li class="uk-hidden-small">
                <a href="#" data-uk-tooltip title="Contact Us">
                    <i class="material-icons fa fa-phone"></i>
                </a>
            </li>
            <li class="uk-hidden-small">
                <a href="system_help" data-uk-tooltip title="Help/FAQ">
                    <i class="material-icons fa fa-question-circle"></i>
                </a>
            </li>
            <li class="uk-hidden-small">
                <a href="#" data-uk-tooltip title="About Us">
                    <i class="material-icons fa fa-info-circle"></i>
                </a>
            </li>
            <li class="uk-hidden-small">
                <a href="dashboard" data-uk-tooltip title="login to system">
                    <i class="material-icons fa fa-sign-in"></i>
                </a>
            </li>

        </ul>
    </div>
</div>
