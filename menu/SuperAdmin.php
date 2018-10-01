    <aside id="sidebar_main">
        <center>
            <a href="#" class="sSidebar_hide sidebar_logo_large">
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
                        <span class="menu_icon"><i class="fa fa-users" style="font-size: 24px;"></i></span>
                        <span class="menu_title">Manage Users</span>
                    </a>
                    <ul>
                        <li><a href="dashboard?action=doctors">Doctors</a></li>
                        <li><a href="dashboard?action=nurses">Nurses</a></li>
                        <li><a href="dashboard?action=receptionists">Receptionist.</a></li>
                    </ul>
                
                </li>
                <li class="menu_admin">
                    <a href="dashboard?action=hospitals">
                        <span class="menu_icon">
                            <i class="fa fa-h-square" style="font-size: 24px;"></i>
                        </span>
                        <span class="menu_title">Manage Hospitals</span>
                    </a>
                </li>
                <li title="Chats">
                    <a href="#">
                        <span class="menu_icon"><i class="fa fa-gear" style="font-size: 24px;"></i></span>
                        <span class="menu_title">Hospital Actions</span>
                    </a>
                    <ul>
                        <li><a href="dashboard?action=region">Hospitals Locations</a></li>
                        <li>
                            <a href="dashboard?action=category">
                            Hospitals Category
                            </a>
                        </li>
                        <li>
                            <a href="dashboard?action=departments">
                            Hospitals Departments
                            </a>
                        </li>
                        <li>
                            <a href="dashboard?action=transport">
                            Transport Mode
                            </a>
                        </li>
                    </ul>
                
                </li>
                <li class="menu_admin">
                    <a href="dashboard?action=system_messages">
                        <span class="menu_icon"><i class="fa fa-exclamation" style="font-size: 24px;"></i></span>
                        <span class="menu_title">Announcements</span>
                    </a>
                </li>
                <li class="menu_admin">
                    <a href="dashboard?action=system_blog">
                        <span class="menu_icon"><i class="fa fa-newspaper-o" style="font-size: 24px;"></i></span>
                        <span class="menu_title">Blog & News</span>
                    </a>
                </li>
                <li class="menu_admin">
                    <a href="dashboard?action=system_settings">
                        <span class="menu_icon"><i class="fa fa-wrench" style="font-size: 24px;"></i></span>
                        <span class="menu_title">System Settings</span>
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