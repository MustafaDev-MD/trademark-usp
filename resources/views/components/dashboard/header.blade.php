<div class="header">

    {{-- LEFT LOGO --}}
    <div class="header-left active">
        <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}" class="logo">
            <img src="{{ asset('imagees/logo-new-BIG.png') }}" alt="Logo">
        </a>
        <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}" class="logo-small">
            <img src="{{ asset('imagees/logo-new-BIG.png') }}" alt="Logo">
        </a>
        <!--<a id="toggle_btn" href="javascript:void(0);"></a>-->
        <a id="toggle_btn" href="javascript:void(0);">
            <i id="toggle_icon" class="fa fa-angle-left"></i>
        </a>

    </div>

    {{-- MOBILE TOGGLE --}}
    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    {{-- RIGHT MENU --}}
    <ul class="nav user-menu">

        {{-- SEARCH --}}
        <!-- <li class="nav-item">
            <div class="top-nav-search">
                <a href="javascript:void(0);" class="responsive-search">
                    <i class="fa fa-search"></i>
                </a>
                <form action="#">
                    <div class="searchinputs">
                        <input type="text" placeholder="Search Here ...">
                        <div class="search-addon">
                            <span>
                                <img src="{{ asset('assets/img/icons/closes.svg') }}" alt="img">
                            </span>
                        </div>
                    </div>
                    <a class="btn" id="searchdiv">
                        <img src="{{ asset('assets/img/icons/search.svg') }}" alt="img">
                    </a>
                </form>
            </div>
        </li> -->

        {{-- LANGUAGE --}}
        <!-- <li class="nav-item dropdown has-arrow flag-nav">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
                <img src="{{ asset('assets/img/flags/us1.png') }}" alt="" height="20">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <img src="{{ asset('assets/img/flags/us.png') }}" height="16"> English
                </a>
                <a href="#" class="dropdown-item">
                    <img src="{{ asset('assets/img/flags/fr.png') }}" height="16"> French
                </a>
            </div>
        </li> -->

        <!-- {{-- NOTIFICATIONS --}}
        <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <img src="{{ asset('assets/img/icons/notification-bing.svg') }}">
                <span class="badge rounded-pill">4</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="#" class="clear-noti">Clear All</a>
                </div>

                <div class="noti-content">
                    <ul class="notification-list">
                        <li class="notification-message">
                            <a href="#">
                                <div class="media d-flex">
                                    <span class="avatar flex-shrink-0">
                                        <img src="{{ asset('assets/img/profiles/avatar-02.jpg') }}">
                                    </span>
                                    <div class="media-body">
                                        <p class="noti-details">
                                            New notification example
                                        </p>
                                        <p class="noti-time">
                                            <span class="notification-time">5 mins ago</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="topnav-dropdown-footer">
                    <a href="#">View all Notifications</a>
                </div>
            </div>
        </li> -->

        {{-- USER MENU --}}
        <!-- <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                <span class="user-img">
                    <img src="{{ asset('assets/img/profiles/avator1.jpg') }}">
                    <span class="status online"></span>
                </span>
            </a>

            <div class="dropdown-menu menu-drop-user">
                <div class="profilename">
                    <div class="profileset">
                        <span class="user-img">
                            <img src="{{ asset('assets/img/profiles/avator1.jpg') }}">
                        </span>
                        <div class="profilesets">
                            <h6>{{ auth()->user()->name }}</h6>
                            <h5>{{ ucfirst(auth()->user()->role) }}</h5>
                        </div>
                    </div>

                    <hr class="m-0">

                    <a class="dropdown-item" href="#">
                        <i class="me-2" data-feather="user"></i> My Profile
                    </a>

                    <a class="dropdown-item" href="#">
                        <i class="me-2" data-feather="settings"></i> Settings
                    </a>

                    <hr class="m-0">

                    {{-- LOGOUT --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item logout pb-0">
                            <img src="{{ asset('assets/img/icons/log-out.svg') }}" class="me-2">
                            Logout
                        </button>
                    </form>

                </div>
            </div>
        </li> -->
        <!-- {{-- LOGOUT --}} -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="dropdown-item logout">
                <img src="{{ asset('assets/img/icons/log-out.svg') }}" class="me-2">
                Logout
            </button>
        </form>

    </ul>

    {{-- MOBILE USER MENU --}}
    <div class="dropdown mobile-user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <i class="fa fa-ellipsis-v"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <!--<a class="dropdown-item" href="#">My Profile</a>-->
            <!--<a class="dropdown-item" href="#">Settings</a>-->

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="dropdown-item">Logout</button>
            </form>
        </div>
    </div>
    <!-- <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="dropdown-item">Logout</button>
    </form> -->

</div>

