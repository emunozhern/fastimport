<ul class="nav header-navbar-rht">
    @if (Auth::user()->is_admin == 1)
        <li class="nav-item desc-list">
            <a href="{{ route('admin.dashboard') }}" class="nav-link header-login" style="">
                <i class="fas fa-plus-circle mr-1"></i> <span> Admin</span>
            </a>
        </li>
    @endif

    <!-- Notifications -->
    {{-- <li class="nav-item dropdown logged-item">
        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" style="">
            <i class="fas fa-bell"></i> <span class="badge badge-pill bg-yellow">1</span>
        </a>
        <div class="dropdown-menu notify-blk dropdown-menu-right notifications">
            <div class="topnav-dropdown-header">
                <span class="notification-title">Notifications</span>
                <a href="javascript:void(0)" class="clear-noti">Clear All </a>
            </div>
            <div class="noti-content">
                <ul class="notification-list">
                    <li class="notification-message">
                        <a href="notifications.html" style="">
                            <div class="media">
                                <span class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle" alt="User Image"
                                        src="assets/img/customer/user-01.jpg">
                                </span>
                                <div class="media-body">
                                    <p class="noti-details"> <span class="noti-title">Jeffrey Akridge has booked your
                                            service</span></p>
                                    <p class="noti-time"><span class="notification-time">Today 10:04 PM</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="notification-message">
                        <a href="notifications.html" style="">
                            <div class="media">
                                <span class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle" alt="User Image"
                                        src="assets/img/customer/user-02.jpg">
                                </span>
                                <div class="media-body">
                                    <p class="noti-details"> <span class="noti-title">Nancy Olson has booked your
                                            service</span></p>
                                    <p class="noti-time"><span class="notification-time">Today 9:45 PM</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="notification-message">
                        <a href="notifications.html" style="">
                            <div class="media">
                                <span class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle" alt="User Image"
                                        src="assets/img/customer/user-03.jpg">
                                </span>
                                <div class="media-body">
                                    <p class="noti-details"> <span class="noti-title">Ramona Kingsley has booked your
                                            service</span></p>
                                    <p class="noti-time"><span class="notification-time">Yesterday 8:17 AM</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="notification-message">
                        <a href="notifications.html" style="">
                            <div class="media">
                                <span class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle" alt="User Image"
                                        src="assets/img/customer/user-04.jpg">
                                </span>
                                <div class="media-body">
                                    <p class="noti-details"> <span class="noti-title">Ricardo Lung has booked your
                                            service</span></p>
                                    <p class="noti-time"><span class="notification-time">Yesterday 6:20 AM</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="notification-message">
                        <a href="notifications.html" style="">
                            <div class="media">
                                <span class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle" alt="User Image"
                                        src="assets/img/customer/user-05.jpg">
                                </span>
                                <div class="media-body">
                                    <p class="noti-details"> <span class="noti-title">Annette Silva has booked your
                                            service</span></p>
                                    <p class="noti-time"><span class="notification-time">17 Sep 2020 10:04 PM</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="topnav-dropdown-footer">
                <a href="notifications.html" style="">View all Notifications</a>
            </div>
        </div>
    </li> --}}
    <!-- /Notifications -->

    <!-- chat -->
    {{-- <li class="nav-item logged-item">
        <a href="chat.html" class="nav-link" style="">
            <i class="fa fa-comments" aria-hidden="true"></i>
        </a>
    </li> --}}
    <!-- /chat -->

    <!-- User Menu -->
    <li class="nav-item dropdown has-arrow logged-item" x-data="{ open: false }" :class="{'show': open }">
        <a href="javascript:void(0);" class="dropdown-toggle nav-link" @click="open = ! open">
            <span class="user-img">
                <img class="rounded-circle" src="{{ Auth::user()->profile_photo_url }}" alt="" width="31">
            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" :class="{'show': open }">
            <div class="user-header">
                <div class="avatar avatar-sm">
                    <img class="avatar-img rounded-circle" src="{{ Auth::user()->profile_photo_url }}" alt="">
                </div>
                <div class="user-text">
                    <h6 class="text-truncate">{{ Auth::user()->name }}</h6>
                    {{-- <p class="text-muted mb-0">{{ __('Manage Account') }}</p>
                    --}}
                </div>
            </div>
            {{-- <a class="dropdown-item"
                href="{{ route('profile.show') }}">{{ __('Profile') }}</a> --}}
            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <a class="dropdown-item" href="{{ route('api-tokens.index') }}">{{ __('API Tokens') }}</a>
            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                this.closest('form').submit();">{{ __('Logout') }}</a>
            </form>


        </div>
    </li>
    <!-- /User Menu -->

</ul>
