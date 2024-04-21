<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="#" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="/" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span id="sidebar-span">{{ __('Menu') }}</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('user.dashboard.index') ? 'active' : '' }}" href="{{route('user.dashboard.index')}}" aria-expanded="false" aria-controls="sidebarDashboard">
                        <i class="ri-dashboard-2-line"></i> <span id="sidebar-span">{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('user.dashboard.cvs.*') ? 'active' : '' }}" href="{{route('user.dashboard.cvs.index')}}" aria-expanded="false" aria-controls="sidebarProjects">
                        <i class="ri-newspaper-line"></i> <span id="sidebar-span">{{ __('New Cvs') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('user.dashboard.offices.*') ? 'active' : '' }}" href="{{route('user.dashboard.offices.index')}}" aria-expanded="false" aria-controls="sidebarProjects">
                        <i class="ri-briefcase-line"></i> <span id="sidebar-span">{{ __('Offices') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('user.dashboard.workers.*') ? 'active' : '' }}" href="{{route('user.dashboard.workers.index')}}" aria-expanded="false" aria-controls="sidebarTasks">
                        <i class="ri-user-2-line"></i> <span id="sidebar-span">{{ __('Workers') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('user.dashboard.customers.*') ? 'active' : '' }}" href="{{route('user.dashboard.customers.index')}}" aria-expanded="false" aria-controls="sidebarSecurity">
                        <i class="ri-headphone-line"></i> <span id="sidebar-span">{{ __('Customers') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('user.dashboard.blogs.*') ? 'active' : '' }}" href="{{route('user.dashboard.blogs.index')}}" aria-expanded="false" aria-controls="sidebarSecurity">
                        <i class="ri-headphone-line"></i> <span id="sidebar-span">{{ __('Blogs') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('user.dashboard.security') ? 'active' : '' }}" href="{{ route('user.dashboard.security') }}" aria-expanded="false" aria-controls="sidebarSecurity">
                        <i class="ri-lock-password-line"></i> <span id="sidebar-span">{{ __('Security') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('user.dashboard.settings') ? 'active' : '' }}" href="{{ route('user.dashboard.settings.index') }}" aria-expanded="false" aria-controls="sidebarSettings">
                        <i class="ri-settings-3-line"></i> <span id="sidebar-span">{{ __('Settings') }}</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>