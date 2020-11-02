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
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="/" class="menu-logo">
                    <img src="{{ asset('img/logo.png') }}" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);"> <i class="fas fa-times"></i></a>
            </div>
            <ul class="main-nav">
                <li class="active">
                    <a href="/">Home</a>
                </li>
                @if (!Auth::check())
                    <li>
                        <a href="javascript:void(0);" @click="showRegister = !showRegister">Registrar
                            usuario</a>
                    </li>
                @endif
            </ul>
        </div>

        @if (!Auth::check())
            <ul class="nav header-navbar-rht">
                <li class="nav-item">
                    <a class="nav-link header-login" href="javascript:void(0);"
                        @click="showLogin = !showLogin">Login</a>
                </li>
            </ul>
        @endif

        @livewire('navigation-dropdown')
    </nav>
</header>
<!-- /Header -->
