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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @yield('before_head')
</head>

<body x-data="mainModals()" :class="{'modal-open': showLogin === true || showRegister === true }">

    <!-- Loader -->
    {{-- <div class="page-loading">
        <div class="preloader-inner">
            <div class="preloader-square-swapping">
                <div class="cssload-square-part cssload-square-green"></div>
                <div class="cssload-square-part cssload-square-pink"></div>
                <div class="cssload-square-blend"></div>
            </div>
        </div>
    </div> --}}
    <!-- /Loader -->

    <div class="main-wrapper">

        <!-- Header -->
        <header class="header">
            <nav class="navbar navbar-expand-lg header-nav">
                <div class="navbar-header">
                    <a id="mobile_btn" href="javascript:void(0);">
                        <span class="bar-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </a>
                    <a href="/" class="navbar-brand logo">
                        <img src="{{ asset('img/logo.png') }}" class="img-fluid" alt="Logo">
                    </a>
                    <a href="/" class="navbar-brand logo-small">
                        <img src="{{ asset('img/logo-icon.png') }}" class="img-fluid" alt="Logo">
                    </a>
                </div>
            </nav>
        </header>
        <!-- /Header -->

        {{ $slot }}

        <!-- Footer -->
        <footer class="footer">

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <!-- Copyright -->
                    <div class="copyright">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="copyright-text">
                                    <p class="mb-0">&copy; 2020 <a href="/">Fast Import Investment</a>. All rights
                                        reserved.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <!-- Copyright Menu -->
                                <div class="copyright-menu">
                                    <ul class="policy-menu">
                                        <li>
                                            <a href="term-condition.html">Terms and Conditions</a>
                                        </li>
                                        <li>
                                            <a href="privacy-policy.html">Privacy</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /Copyright Menu -->
                            </div>
                        </div>
                    </div>
                    <!-- /Copyright -->
                </div>
            </div>
            <!-- /Footer Bottom -->

        </footer>
        <!-- /Footer -->

    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.2.1/dist/alpine.js" defer></script>

    @yield('before_body')
</body>

</html>
