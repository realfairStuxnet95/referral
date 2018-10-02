    <aside id="sidebar_main">
        <center>
            <a href="dashboard" class="sSidebar_hide sidebar_logo_large">
                <img class="logo_regular" src="assets/img/logo/logo_text.png" alt="" style="height: auto;width: 60%;"/>
            </a>
        </center>
        <div class="menu_section">
            <ul>
                <li class="menu_admin" title="Dashboard">
                    <a href="dashboard">
                        <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                        <span class="menu_title">Dashboard</span>
                    </a>
                    
                </li>
                <li title="Chats">
                    <a href="#">
                        <span class="menu_icon"><i class="fa fa-file-text" style="font-size: 24px;"></i></span>
                        <span class="menu_title">Manage Referrals</span>
                    </a>
                    <ul>
                        <li><a href="dashboard?action=tabbed">Incoming referrals</a></li>
                        <li><a href="dashboard?action=outgoing_referrals">Outgoing referrals</a></li>
                    </ul>
                
                </li>
                <li style="display: block;" class="menu_admin">
                    <a href="dashboard?action=counter_referrals">
                        <span class="menu_icon"><i class="fa fa-user-md" style="font-size: 24px;"></i></span>
                        <span class="menu_title">Counter Referrals</span>
                    </a>
                </li>
                <li style="display: none;" class="menu_admin">
                    <a href="dashboard?action=departments">
                        <span class="menu_icon"><i class="fa fa-user-md" style="font-size: 24px;"></i></span>
                        <span class="menu_title">Appointments</span>
                    </a>
                </li>

                <li style="display: none;" class="menu_admin">
                    <a href="#">
                        <span class="menu_icon"><i class="fa fa-bell" style="font-size: 24px;"></i></span>
                        <span class="menu_title">Notifications</span>
                    </a>
                </li>
                <li style="display: none;" class="menu_admin">
                    <a href="#">
                        <span class="menu_icon"><i class="fa fa-flag" style="font-size: 24px;"></i></span>
                        <span class="menu_title">Reports</span>
                    </a>
                </li>
                <li style="display: none;" class="menu_admin">
                    <a href="#">
                        <span class="menu_icon"><i class="fa fa-newspaper-o" style="font-size: 24px;"></i></span>
                        <span class="menu_title">Announcements</span>
                    </a>
                </li>
                <li class="menu_admin">
                    <a href="profile">
                        <span class="menu_icon"><i class="fa fa-wrench" style="font-size: 24px;"></i></span>
                        <span class="menu_title">Account Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <style type="text/css">
        a.menu_admin:hover{
            color: #009966;
            cursor: pointer;
        }
    </style>