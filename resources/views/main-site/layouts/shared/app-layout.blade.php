@include("main-site.layouts.shared.includes.main")

<head>
    @yield('title')
    @include("main-site.layouts.shared.includes.head-css")
    @yield('styles')
    <a class="navbar-brand" href="{{ route('home.index') }}">
        @php
        $src = $siteSettings->hasMedia('icon') ? $siteSettings->getFirstMedia('icon')->getUrl() : '/images/custom/rayak-1.webp';
        @endphp
        <link rel="shortcut icon" type="image/x-icon" href="/images/custom/rayak-1.webp" />
    </a>
</head>

<body data-mobile-nav-style="classic" class="custom-cursor">

    <div class="cursor-page-inner">
        <div class="circle-cursor circle-cursor-inner"></div>
        <div class="circle-cursor circle-cursor-outer"></div>
    </div>

    @yield('content')

    <div class="d-flex flex-row justify-content-between align-items-center fixed-bottom mb-3">
        <a href="https://api.whatsapp.com/send?phone={{$siteSettings->whatsapp_number}}" target="_blank" class="btn btn-outline-success border-none rounded-circle mx-3 ">
            <i class="fab fa-whatsapp" style="font-size: 40px;"></i>
        </a>

        <a href="tel:{{$siteSettings->contact_phone}}" target="_blank" class="btn btn-outline-secondary border-none rounded-circle mx-3">
            <i class="fas fa-headphones" style="font-size: 40px;"></i>
        </a>
    </div>

    @include("main-site.layouts.shared.includes.footer")
    @include("main-site.layouts.shared.includes.vendor-scripts")

    <div class="scroll-progress d-none d-xxl-block">
        <a href="#" class="scroll-top" aria-label="scroll">
            <span class="scroll-text">Scroll down
            </span>
            <span class="scroll-line">
                <span class="scroll-point">
                </span>
            </span>
        </a>
    </div>

    @yield('scripts')

</body>