<div class="col-xl-3 col-md-4 theiaStickySidebar"
    style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

    @if (Auth::user()->is_approved)
    <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
        <div class="mb-4">
            <div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
                <img alt="profile image" src="{{ Auth::user()->profile_photo_url }}" class="avatar-lg rounded-circle">
                <div class="ml-sm-3 ml-md-0 ml-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
                    <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                    <p class="text-muted mb-0"> {{ Auth::user()->created_at ? 'hace ' . Auth::user()->created_at->diffForHumans(null, true) : ''}}</p>
                </div>
            </div>
        </div>

        <div class="widget settings-menu">
            <ul>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" style="">
                        <i class="fas fa-chart-line"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('matrix') }}" class="nav-link {{ request()->routeIs('matrix') ? 'active' : '' }}"
                        style="">
                        <i class="far fa-calendar-check"></i> <span>Matrix</span>
                    </a>
                </li>
                @if (!Auth::user()->dni_photo_path_1 && !Auth::user()->dni_photo_path_2) 
                    <li class="nav-item">
                        <a href="{{ route('upload_dni_for_verification') }} {{ request()->routeIs('upload_dni_for_verification') ? 'active' : '' }}"
                            class="nav-link" style="">
                            <i class="far fa-user"></i> <span>Settings</span>
                        </a>
                    </li>
                 @endif 
            </ul>
        </div>
        <div class="resize-sensor"
            style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; z-index: -1; visibility: hidden;">
            <div class="resize-sensor-expand"
                style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                <div
                    style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 310px; height: 452px;">
                </div>
            </div>
            <div class="resize-sensor-shrink"
                style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                <div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%">
                </div>
            </div>
        </div>
    </div>
    @endif
   
</div>
