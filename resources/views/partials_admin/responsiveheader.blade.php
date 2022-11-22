<div class="responsive-header">
    <div class="res-logo"><img src="images/logo.png" alt=""></div>

    <div class="user-avatar mobile">
        <a href="profile.html" title="View Profile"><img alt="" src="images/resources/user.jpg"></a>
        <div class="name">
            <h4>{{ Auth::user()->username }}</h4>
            {{-- <span>{{ Auth::user()->email }}</span> --}}
        </div>
    </div>
    <div class="right-compact">
        <div class="menu-area">
            <div id="nav-icon3">
                <i>
                    <svg class="feather feather-grid" stroke-linejoin="round" stroke-linecap="round" stroke-width="2"
                        stroke="currentColor" fill="none" viewBox="0 0 24 24" height="18" width="18"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect height="7" width="7" y="3" x="3" />
                        <rect height="7" width="7" y="3" x="14" />
                        <rect height="7" width="7" y="14" x="14" />
                        <rect height="7" width="7" y="14" x="3" />
                    </svg>
                </i>
            </div>
            <ul class="drop-menu">
                <li><a title="profile.html" href="profile.html"><i class="icofont-user-alt-1"></i>Your Profile</a></li>
                <li><a title="" href="#"><i class="icofont-question-circle"></i>Help</a></li>
                <li><a title="" href="#"><i class="icofont-gear"></i>Setting</a></li>
                <li><a class="dark-mod" title="" href="#"><i class="icofont-moon"></i>Dark Mode</a></li>
                <li><a title="" href="login-register.html" class="logout"><i class="icofont-logout"></i>Logout</a></li>
            </ul>
        </div>
        <div class="res-search">
            <span><i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-search">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg></i></span>
        </div>
    </div>
    <div class="restop-search">
        <span class="hide-search"><i class="icofont-close-circled"></i></span>
        <form method="post">
            <input type="text" placeholder="Search...">
        </form>
    </div>
</div>
<!-- responsive header -->