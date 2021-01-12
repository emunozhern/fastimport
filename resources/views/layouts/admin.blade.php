<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap"
        rel="stylesheet">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <script src="{{ asset('global/plugins/jquery.min.js') }}"></script>
</head>

<body>
    <div class="main-wrapper">

        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <a href="{{ route('admin.dashboard') }}" class="logo logo-small">
                    <img src="{{ asset('img/logo-icon.png') }}" alt="Logo" width="30" height="30">
                </a>
            </div>
            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-align-left"></i>
            </a>
            <a class="mobile_btn" id="mobile_btn" href="javascript:void(0);">
                <i class="fas fa-align-left"></i>
            </a>

            <ul class="nav user-menu">

                <!-- User Menu -->
                <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle user-link  nav-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="{{ Auth::user()->profile_photo_url }}" width="40"
                                alt="Admin">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="admin-profile.html">Profile</a>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
                <!-- /User Menu -->

            </ul>
        </div>
        <!-- /Header -->
        {{-- {{ $pheader }} --}}

        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-logo">
                <a href="{{ route('admin.dashboard') }}">
                    <img src="{{ asset('img/logo-icon.png') }}" class="img-fluid" alt="">
                </a>
            </div>
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="active">
                            <a href="{{ route('index') }}"><i class="fas fa-columns"></i>
                                <span>Volver a area de Clientes</span></a>
                        </li>
                        <li>
                            <a href="{{ route('admin.dashboard') }}"><i class="fas fa-columns"></i>
                                <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="{{ route('admin.network') }}"><i class="fas fa-bullhorn"></i> <span>
                                    Network</span></a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users') }}"><i class="fas fa-user"></i> <span>Users</span></a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users-pending') }}"><i class="fas fa-user-clock"></i> <span>Pendientes</span></a>
                        </li>
                        {{-- <li>
                            <a href="settings.html"><i class="fas fa-cog"></i> <span> Settings</span></a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->

        <div class="page-wrapper">
            <div class="content container-fluid">

                {{ $slot }}

            </div>
        </div>
    </div>

    {{-- @stack('modals') --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.2.1/dist/alpine.js" defer></script>

    <script src="{{ asset('global/plugins/jquery-org-chart/js/taffy.js') }}"></script>
    <script src="{{ asset('global/plugins/jquery-org-chart/js/jquery.jOrgChart.js') }}"></script>
    @livewireScripts

</body>

</html>
