<nav class="navbar navbar-expand-lg header-light bg-white responsive-sticky">
    <div class="container-fluid">
        <div class="col-auto col-lg-2 me-lg-0 me-auto">
            <a class="navbar-brand" href="{{ route('home.index') }}">
                <img src="/images/custom/rayak-1.webp" alt="" class="default-logo">
                <img src="/images/custom/rayak-1.webp" alt="" class="alt-logo">
                <img src="/images/custom/rayak-1.webp" alt="" class="mobile-logo">
            </a>
        </div>
        <div class="col-auto menu-order position-static">
            <button class="navbar-toggler float-start" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-line"></span>
                <span class="navbar-toggler-line"></span>
                <span class="navbar-toggler-line"></span>
                <span class="navbar-toggler-line"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="{{ route('home.index') }}" class="nav-link">{{ __('Home') }}</a></li>
                    <li class="nav-item dropdown dropdown-with-icon-style02">
                        <a href="#" class="nav-link">{{ __('Our Services') }}</a>
                        <i class="fa-solid fa-angle-down dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a href="#"><img src="/images/demo-accounting-company-icon02.svg" alt="">{{ __('Recruitment Procedures') }}</a></li>
                            <li><a href="#"><img src="/images/demo-accounting-company-icon03.svg" alt="">{{ __('Worker Selection') }}</a></li>
                            <li><a href="#"><img src="/images/demo-accounting-company-icon-04.svg" alt="">{{ __('Recruitment Contracting') }}</a></li>
                            <li><a href="#"><img src="/images/demo-accounting-company-icon-05.svg" alt="">{{ __('Recruitment Policies') }}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link">{{ __('Recruitment Journey') }}</a></li>
                    <li class="nav-item dropdown dropdown-with-icon-style02">
                        <a href="#" class="nav-link">{{ __('Pages') }}</a>
                        <i class="fa-solid fa-angle-down dropdown-toggle" id="pages" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                        <ul class="dropdown-menu" aria-labelledby="pages">
                            <li><a href="{{ route('home.blog') }}" class="dropdown-item">{{ __('Blog') }}</a></li>
                            <li><a href="{{ route('home.about') }}" class="dropdown-item">{{ __('About') }}</a></li>
                            <li><a href="{{ route('home.contact') }}" class="dropdown-item">{{ __('Contact Us') }}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="{{ route('home.workers.index') }}" class="nav-link">{{ __('Workers') }}</a></li>
                    @auth('web')
                    <li class="nav-item">
                        <a class="nav-link text-base-color" href="{{ route('user.dashboard.index') }}">{{ __('Dashboard') }}</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
        <div class="col-auto col-lg-2 text-end d-sm-flex">
            <div class="header-icon">
                <div class="header-button">
                    @guest('account')
                    <a href="{{ route('account.login') }}" class="btn btn-small btn-rounded btn-base-color btn-box-shadow">{{ __('Log In') }}</a>
                    @endguest
                    @auth('account')
                    @if(request()->user('account')->isCustomerAccount)
                    <a href="{{ route('account.dashboard.customer.index') }}" class="btn btn-small btn-rounded btn-base-color btn-box-shadow">{{ __('Dashboard') }}</a>
                    @endif
                    @if(request()->user('account')->isOfficeAccount)
                    <a href="{{ route('account.dashboard.office.index') }}" class="btn btn-small btn-rounded btn-base-color btn-box-shadow">{{ __('Dashboard') }}</a>
                    @endif
                    @endauth

                </div>
            </div>
        </div>
    </div>
    <form id="logoutForm" action="{{ route('account.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</nav>

<style>
    /* For RTL layouts */
    [dir="rtl"] .me-auto {
        margin-left: auto !important;
        margin-right: 0 !important;
    }
</style>