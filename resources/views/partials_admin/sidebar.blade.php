<nav class="sidebar">
    <ul class="menu-slide">

        {{-- Side Bar Superadmin --}}
        @if(Auth::user()->username == "superadmin")

        <li class="{{ Request::is('administrator') ? 'active' : '' }}">
            <a class="" href="/administrator" title="">
                <i><svg id="icon-home" class="feather feather-home" stroke-linejoin="round" stroke-linecap="round"
                        stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        <polyline points="9 22 9 12 15 12 15 22" />
                    </svg></i> Dashboard
            </a>
        </li>

        <li class="{{ Request::is('administrator/post*') ? 'active' : '' }}">
            <a class="" href="/administrator/post" title="">
                <i><svg id="ab4" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-airplay">
                        <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
                        <polygon points="12 15 17 21 7 21 12 15"></polygon>
                    </svg></i> Post
            </a>
        </li>

        <li class="{{ Request::is('administrator/premiumcontent*') ? 'active' : '' }}">
            <a class="" href="/administrator/premiumcontent" title="">
                <i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-gift">
                        <polyline points="20 12 20 22 4 22 4 12"></polyline>
                        <rect x="2" y="7" width="20" height="5"></rect>
                        <line x1="12" y1="22" x2="12" y2="7"></line>
                        <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path>
                        <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path>
                    </svg></i> Premium Content
            </a>
        </li>

        <li class="{{ Request::is('administrator/webinars*') ? 'active' : '' }}">
            <a class="" href="/administrator/webinars" title="">
                <i><svg id="webi" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-speaker">
                        <rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect>
                        <circle cx="12" cy="14" r="4"></circle>
                        <line x1="12" y1="6" x2="12.01" y2="6"></line>
                    </svg></i> Webinar
            </a>
        </li>

        <li class="{{ Request::is('administrator/community*') ? 'active' : '' }}">
            <a class="" href="/administrator/community-news" title="">
                <i><svg id="commu" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-users">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg></i> Community
            </a>
        </li>

        <li class="{{ Request::is('administrator/communitiesgroup*') ? 'active' : '' }}">
            <a class="" href="/administrator/communitiesgroup" title="">
                <i><svg id="readmore" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-book">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                    </svg></i> Read More Community
            </a>
        </li>

        <li class="{{ Request::is('administrator/ads*') ? 'active' : '' }}">
            <a class="" href="/administrator/ads" title="">
                <i>
                    <svg id="ads" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-image">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                        <polyline points="21 15 16 10 5 21"></polyline>
                    </svg></i> Ads
            </a>
        </li>

        <li class="{{ Request::is('administrator/media*') ? 'active' : '' }}">
            <a class="" href="/administrator/media" title="">
                <i><svg id="med" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-camera">
                        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z">
                        </path>
                        <circle cx="12" cy="13" r="4"></circle>
                    </svg></i> Media
            </a>
        </li>

        <li class="menu-item-has-children {{ Request::is('administrator/comment*') ? 'active' : '' }}">
            <a class="" href="#" title="">
                <i><svg id="kom" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-file-text">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg></i> Comment
            </a>
            {{-- User --}}
            <ul class="submenu">
                <li><a href="/administrator/comment" title="">Comment Article</a></li>
                <li><a href="/administrator/commentcom" title="">Comment Community News</a></li>
            </ul>
        </li>

        <li class="menu-item-has-children {{ Request::is('administrator/users*') ? 'active' : '' }}">
            <a class="" href="#" title="">
                <i><svg id="ab1" class="feather feather-users" stroke-linejoin="round" stroke-linecap="round"
                        stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                        <circle r="4" cy="7" cx="9" />
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg></i> User Management
            </a>
            {{-- User --}}
            <ul class="submenu">
                <li><a href="/administrator/users" title="">All</a></li>
                <li><a href="/administrator/superadmin" title="">Super Admin</a></li>
                <li><a href="/administrator/admin" title="">Admin</a></li>
                <li><a href="/administrator/editor" title="">Editor</a></li>
                <li><a href="/administrator/contributor" title="">Contributor</a></li>
                <li><a href="/administrator/subscriber" title="">Subscriber</a></li>
            </ul>
        </li>

        <li class="{{ Request::is('administrator/roles*') ? 'active' : '' }}">
            <a class="" href="/administrator/roles" title="">
                <i class="">
                    <svg id="main" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-tool">
                        <path
                            d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z">
                        </path>
                    </svg></i>Roles
            </a>
        </li>

        @endif

        {{-- Side Bar Admin --}}
        @if(Auth::user()->username == "admin")
        <li class="{{ Request::is('administrator') ? 'active' : '' }}">
            <a class="" href="/administrator" title="">
                <i><svg id="icon-home" class="feather feather-home" stroke-linejoin="round" stroke-linecap="round"
                        stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        <polyline points="9 22 9 12 15 12 15 22" />
                    </svg></i> Dashboard
            </a>
        </li>

        <li class="menu-item-has-children {{ Request::is('administrator/comment*') ? 'active' : '' }}">
            <a class="" href="#" title="">
                <i><svg id="commu" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-users">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg></i> Users
            </a>
            {{-- User --}}
            <ul class="submenu">
                <li><a href="/administrator/users/create" title="">Create Users</a></li>
                <li><a href="/administrator/users" title="">List Users</a></li>
            </ul>
        </li>

        <li class="{{ Request::is('administrator/member*') ? 'active' : '' }}">
            <a class="" href="/administrator/member" title="">
                <i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-gift">
                        <polyline points="20 12 20 22 4 22 4 12"></polyline>
                        <rect x="2" y="7" width="20" height="5"></rect>
                        <line x1="12" y1="22" x2="12" y2="7"></line>
                        <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path>
                        <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path>
                    </svg></i> Print Card Member
            </a>
        </li>

        <li class="menu-item-has-children {{ Request::is('administrator/book*') ? 'active' : '' }}">
            <a class="" href="#" title="">
                <i><svg id="kom" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-file-text">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg></i> Book
            </a>
            {{-- User --}}
            <ul class="submenu">
                <li><a href="/administrator/book/create" title="">Create Book</a></li>
                <li><a href="/administrator/book" title="">List Book</a></li>
            </ul>
        </li>

        <li class="{{ Request::is('administrator/community*') ? 'active' : '' }}">
            <a class="" href="/administrator/community-news" title="">
                <i><svg id="commu" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-users">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg></i> Print Sticker Code Book
            </a>
        </li>

        <li class="menu-item-has-children {{ Request::is('administrator/catalog*') ? 'active' : '' }}">
            <a class="" href="#" title="">
                <i><svg id="kom" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-file-text">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg></i> Catalog
            </a>
            {{-- User --}}
            <ul class="submenu">
                <li><a href="/administrator/catalog/create" title="">Create Catalog</a></li>
                <li><a href="/administrator/catalog" title="">List Catalog</a></li>
            </ul>
        </li>

        <li class="menu-item-has-children {{ Request::is('administrator/databook*') ? 'active' : '' }}">
            <a class="" href="#" title="">
                <i><svg id="kom" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-file-text">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg></i> Data Back Book
            </a>
            {{-- User --}}
            <ul class="submenu">
                <li><a href="/administrator/databook/borrowbook" title="">Borrow Book</a></li>
                <li><a href="/administrator/databook/returnbook" title="">Return Book</a></li>
            </ul>
        </li>


        @endif

        {{-- Side Bar Admin --}}
        @if(Auth::user()->rolesname == "editor")
        <li class="{{ Request::is('administrator') ? 'active' : '' }}">
            <a class="" href="/administrator" title="">
                <i><svg id="icon-home" class="feather feather-home" stroke-linejoin="round" stroke-linecap="round"
                        stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        <polyline points="9 22 9 12 15 12 15 22" />
                    </svg></i> Dashboard
            </a>
        </li>

        <li class="{{ Request::is('administrator/post*') ? 'active' : '' }}">
            <a class="" href="/administrator/post" title="">
                <i><svg id="ab4" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-airplay">
                        <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
                        <polygon points="12 15 17 21 7 21 12 15"></polygon>
                    </svg></i> Post
            </a>
        </li>

        <li class="{{ Request::is('administrator/premiumcontent*') ? 'active' : '' }}">
            <a class="" href="/administrator/premiumcontent" title="">
                <i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-gift">
                        <polyline points="20 12 20 22 4 22 4 12"></polyline>
                        <rect x="2" y="7" width="20" height="5"></rect>
                        <line x1="12" y1="22" x2="12" y2="7"></line>
                        <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path>
                        <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path>
                    </svg></i> Premium Content
            </a>
        </li>

        <li class="{{ Request::is('administrator/webinars*') ? 'active' : '' }}">
            <a class="" href="/administrator/webinars" title="">
                <i><svg id="webi" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-speaker">
                        <rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect>
                        <circle cx="12" cy="14" r="4"></circle>
                        <line x1="12" y1="6" x2="12.01" y2="6"></line>
                    </svg></i> Webinar
            </a>
        </li>

        <li class="{{ Request::is('administrator/community*') ? 'active' : '' }}">
            <a class="" href="/administrator/community-news" title="">
                <i><svg id="commu" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-users">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg></i> Community
            </a>
        </li>

        <li class="{{ Request::is('administrator/communitiesgroup*') ? 'active' : '' }}">
            <a class="" href="/administrator/communitiesgroup" title="">
                <i><svg id="readmore" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-book">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                    </svg></i> Read More Community
            </a>
        </li>

        <li class="{{ Request::is('administrator/media*') ? 'active' : '' }}">
            <a class="" href="/administrator/media" title="">
                <i><svg id="med" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-camera">
                        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z">
                        </path>
                        <circle cx="12" cy="13" r="4"></circle>
                    </svg></i> Media
            </a>
        </li>

        <li class="menu-item-has-children {{ Request::is('administrator/comment*') ? 'active' : '' }}">
            <a class="" href="#" title="">
                <i><svg id="kom" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-file-text">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg></i> Comment
            </a>
            {{-- User --}}
            <ul class="submenu">
                <li><a href="/administrator/comment" title="">Comment Article</a></li>
                <li><a href="/administrator/commentcom" title="">Comment Community News</a></li>
            </ul>
        </li>

        <li class="menu-item-has-children {{ Request::is('administrator/users*') ? 'active' : '' }}">
            <a class="" href="#" title="">
                <i><svg id="ab1" class="feather feather-users" stroke-linejoin="round" stroke-linecap="round"
                        stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                        <circle r="4" cy="7" cx="9" />
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg></i> User Management
            </a>
            {{-- User --}}
            <ul class="submenu">
                <li><a href="/administrator/users" title="">All</a></li>
                {{-- <li><a href="/administrator/superadmin" title="">Super Admin</a></li> --}}
                {{-- <li><a href="/administrator/admin" title="">Admin</a></li> --}}
                <li><a href="/administrator/editor" title="">Editor</a></li>
                <li><a href="/administrator/contributor" title="">Contributor</a></li>
                <li><a href="/administrator/subscriber" title="">Subscriber</a></li>
            </ul>
        </li>
        @endif
    </ul>
</nav>
<!-- sidebar -->