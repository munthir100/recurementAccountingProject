<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="/" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('dashboard/assets/images/logo-sm.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('dashboard/assets/images/logo-dark.png')}}" alt="" height="17">
                        </span>
                    </a>

                    <a href="/" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('dashboard/assets/images/logo-sm.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('dashboard/assets/images/logo-light.png') }}" alt="" height="17">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
                <form method="get" action="" class="app-search d-none d-md-block">
                    <div class="position-relative">
                        <input type="text" name="search" class="form-control" placeholder="{{__('Search...')}}" autocomplete="off" id="search-options" value="">
                        <span class="mdi mdi-magnify search-widget-icon"></span>
                        <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                    </div>
                </form>
            </div>

            <div class="d-flex align-items-center">


                <div class="dropdown d-md-none topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-search fs-22"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="{{ __('Search ...') }}" aria-label="Recipient's username">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="dropdown ms-1 topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img id="header-lang-img" src="{{ asset('dashboard/assets/images/flags/' . (app()->getLocale() == 'ar' ? 'sa' : 'us') . '.svg') }}" alt="{{ __('Header Language') }}" height="20" class="rounded">
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item - English -->
                        @if(app()->getLocale() == 'ar')
                        <a href="#" onclick="document.getElementById('enForm').submit()" class="dropdown-item notify-item language py-2" data-lang="en" title="{{ __('English') }}">
                            <img src="{{ asset('dashboard/assets/images/flags/us.svg') }}" alt="user-image" class="me-2 rounded" height="18">
                            <span class="align-middle">{{ __('English') }}</span>
                        </a>
                        @else
                        <!-- item - Arabic -->
                        <a href="#" onclick="document.getElementById('arForm').submit()" class="dropdown-item notify-item language" data-lang="ar" title="{{ __('Arabic') }}">
                            <img src="{{ asset('dashboard/assets/images/flags/sa.svg') }}" alt="user-image" class="me-2 rounded" height="18">
                            <span class="align-middle">{{ __('Arabic') }}</span>
                        </a>
                        @endif
                    </div>
                </div>






                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle theme-selected-mode">
                        <i class='bx bx-moon theme-mode fs-22'></i>
                    </button>
                </div>
                @auth
                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user" src="{{asset('dashboard/assets/images/users/user-dummy-img.jpg')}}" alt="{{ __('Header Avatar') }}">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{request()->user()->name}}</span>
                                <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">{{request()->user()->email}}</span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">{{request()->user()->name}}</h6>
                        <a class="dropdown-item" href="{{route('user.dashboard.offices.index')}}"><i class="ri-briefcase-line text-muted fs-16 align-middle me-1"></i> <span class="align-middle">{{ __('Offices') }}</span></a>
                        <a class="dropdown-item" href="{{route('user.dashboard.workers.index')}}"><i class="ri-user-2-line text-muted fs-16 align-middle me-1"></i> <span class="align-middle">{{ __('Workers') }}</span></a>
                        <a class="dropdown-item" href="{{route('user.dashboard.customers.index')}}"><i class="ri-user-line text-muted fs-16 align-middle me-1"></i> <span class="align-middle">{{ __('Customers') }}</span></a>
                        <a class="dropdown-item" href="{{route('user.dashboard.settings.index')}}"><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">{{ __('Settings') }}</span></a>
                        <a class="dropdown-item" href="{{route('user.dashboard.security')}}"><i class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle">{{ __('Security') }}</span></a>
                        <a class="dropdown-item" href="{{route('user.dashboard.reports.index')}}"><i class="ri-file-list-3-line text-muted fs-16 align-middle me-1"></i> <span class="align-middle">{{ __('Accounting Reports') }}</span></a>
                        <button class="dropdown-item" onclick="logout()" href="#"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="{{ __('Logout') }}">{{ __('Logout') }}</span></button>
                    </div>
                </div>
                @endauth
            </div>
        </div>
    </div>
</header>

<form action="{{ route('user.logout.submit') }}" id="logoutForm" method="post" class="hidden">
    @csrf
</form>
<script>
    function logout() {
        document.getElementById('logoutForm').submit();
    }
</script>