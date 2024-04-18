@include("main-site.layouts.shared.includes.main")

<head>
    @yield('title')
    @include("main-site.layouts.shared.includes.head-css")
    @yield('styles')
</head>

<body data-mobile-nav-style="classic" class="custom-cursor">
    
    <div class="cursor-page-inner">
        <div class="circle-cursor circle-cursor-inner"></div>
        <div class="circle-cursor circle-cursor-outer"></div>
    </div>

    @yield('content')
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