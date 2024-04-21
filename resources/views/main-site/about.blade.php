@extends('main-site.layouts.shared.app-layout')
@section('title')
@include("main-site.layouts.shared.includes.title-meta", ["title" => __("Contact Us")])
@endsection
@section('content')
<header class="header-with-topbar">
    @include('main-site.layouts.shared.includes.header')
</header>
<x-main-site.page-header title="About" />
<!-- end page title -->
<!-- start section -->
<section>
    <div class="container">

        <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 justify-content-center mb-5" data-anime='{ "el": "childs", "translateX": [-30, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
            <!-- start features box item -->
            <div class="col icon-with-text-style-07 transition-inner-all md-mb-30px">
                <div class="bg-very-light-gray h-100 justify-content-end feature-box flex-column-reverse p-15 md-p-13 border-radius-8px">
                    <div class="feature-box-icon">
                        <a href="#">
                            <span class="btn-icon bg-base-color">
                                <i style="font-size:70px" class="feather icon-feather-headphones"></i>
                            </span>
                        </a>
                    </div>
                    <div class="feature-box-content">
                        <a href="#" class="d-inline-block fw-600 text-dark-gray mb-5px fs-20 ls-minus-05px">Business process</a>
                        <p class="mb-30px">An activity or set of activities that can accomplish a specific organizational goal.</p>
                    </div>
                </div>
            </div>
            <!-- end features box item -->
            <!-- start features box item -->
            <div class="col icon-with-text-style-07 transition-inner-all md-mb-30px">
                <div class="bg-very-light-gray h-100 justify-content-end feature-box flex-column-reverse p-15 md-p-13 border-radius-8px">
                    <div class="feature-box-icon">
                        <a href="#">
                            <span class="btn-icon bg-base-color">
                                <i style="font-size:70px" class="feather icon-feather-headphones"></i>
                            </span>
                        </a>
                    </div>
                    <div class="feature-box-content">
                        <a href="#" class="d-inline-block fw-600 text-dark-gray mb-5px fs-20 ls-minus-05px">Business process</a>
                        <p class="mb-30px">An activity or set of activities that can accomplish a specific organizational goal.</p>
                    </div>
                </div>
            </div>
            <!-- end features box item -->
            <!-- start features box item -->
            <div class="col icon-with-text-style-07 transition-inner-all md-mb-30px">
                <div class="bg-very-light-gray h-100 justify-content-end feature-box flex-column-reverse p-15 md-p-13 border-radius-8px">
                    <div class="feature-box-icon">
                        <a href="#">
                            <span class="btn-icon bg-base-color">
                                <i style="font-size:70px" class="feather icon-feather-headphones"></i>
                            </span>
                        </a>
                    </div>
                    <div class="feature-box-content">
                        <a href="#" class="d-inline-block fw-600 text-dark-gray mb-5px fs-20 ls-minus-05px">Business process</a>
                        <p class="mb-30px">An activity or set of activities that can accomplish a specific organizational goal.</p>
                    </div>
                </div>
            </div>
            <!-- end features box item -->
        </div>
    </div>
</section>
<!-- end section -->



<!-- start section -->
<section class="pt-md-0">
    <div class="container overlap-section">
        <div class="row m-0 align-items-center justify-content-center bg-white border-radius-100px md-border-radius-6px ps-10px pe-10px box-shadow-quadruple-large appear anime-complete" data-anime='{ "scale": [1.1, 1], "opacity": [0,1], "duration": 800, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
            <div class="col-lg-10">
                <div class="swiper slider-one-slide testimonials-style-09" data-slider-options='{ "slidesPerView": 1, "loop": true, "autoplay": { "delay": 4000, "disableOnInteraction": false }, "navigation": { "nextEl": ".slider-one-slide-next-1", "prevEl": ".slider-one-slide-prev-1" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "effect": "slide" }'>
                    <div class="swiper-wrapper">
                        <!-- start text slider item -->
                        <div class="swiper-slide">
                            <div class="row align-items-center pt-25px pb-25px">
                                <div class="col-lg-8 d-lg-flex align-items-center text-center text-lg-start">
                                    <img src="https://via.placeholder.com/210x210" class="rounded-circle w-100px h-100px md-mb-35px" alt="">
                                    <span class="d-block ps-40px md-ps-0 md-mx-auto position-relative"><img src="images/demo-accounting-home-quote-img.png" class="position-absolute left-minus-25px top-minus-15px lg-top-minus-5px md-top-minus-50px w-40px md-left-0px md-right-0px md-mx-auto" alt="">This is one of the best templates I've came across. Very organized, great design style and easy around.</span>
                                </div>
                                <div class="col-lg-1 d-none d-lg-inline-block">
                                    <div class="separator-line w-1px md-w-100 h-60px md-h-1px bg-extra-medium-gray mx-auto"></div>
                                </div>
                                <div class="col-lg-3 text-center text-lg-start md-mt-15px">
                                    <span class="fs-19 ls-minus-05px fw-600 text-dark-gray d-block lh-28">Shoko mugikura</span>
                                    <div>Financial manager</div>
                                </div>
                            </div>
                        </div>
                        <!-- end text slider item -->
                        <!-- start text slider item -->
                        <div class="swiper-slide">
                            <div class="row align-items-center pt-25px pb-25px">
                                <div class="col-lg-8 d-lg-flex align-items-center text-center text-lg-start">
                                    <img src="https://via.placeholder.com/200x200" class="rounded-circle w-100px h-100px md-mb-35px" alt="">
                                    <span class="d-block ps-40px md-ps-0 md-mx-auto position-relative"><img src="images/demo-accounting-home-quote-img.png" class="position-absolute left-minus-25px top-minus-15px lg-top-minus-5px md-top-minus-50px w-40px md-left-0px md-right-0px md-mx-auto" alt="">This is one of the best templates I've came across. Very organized, great design style and easy around.</span>
                                </div>
                                <div class="col-lg-1 d-none d-lg-inline-block">
                                    <div class="separator-line w-1px md-w-100 h-60px md-h-1px bg-extra-medium-gray mx-auto"></div>
                                </div>
                                <div class="col-lg-3 text-center text-lg-start md-mt-15px">
                                    <span class="fs-19 ls-minus-05px fw-600 text-dark-gray d-block lh-28">Matthew taylor</span>
                                    <div>Financial manager</div>
                                </div>
                            </div>
                        </div>
                        <!-- end text slider item -->
                        <!-- start text slider item -->
                        <div class="swiper-slide">
                            <div class="row align-items-center pt-25px pb-25px">
                                <div class="col-lg-8 d-lg-flex align-items-center text-center text-lg-start">
                                    <img src="https://via.placeholder.com/200x200" class="rounded-circle w-100px h-100px md-mb-35px" alt="">
                                    <span class="d-block ps-40px md-ps-0 md-mx-auto position-relative"><img src="images/demo-accounting-home-quote-img.png" class="position-absolute left-minus-25px top-minus-15px lg-top-minus-5px md-top-minus-50px w-40px md-left-0px md-right-0px md-mx-auto" alt="">This is one of the best templates I've came across. Very organized, great design style and easy around.</span>
                                </div>
                                <div class="col-lg-1 d-none d-lg-inline-block">
                                    <div class="separator-line w-1px md-w-100 h-60px md-h-1px bg-extra-medium-gray mx-auto"></div>
                                </div>
                                <div class="col-lg-3 text-center text-lg-start md-mt-15px">
                                    <span class="fs-19 ls-minus-05px fw-600 text-dark-gray d-block lh-28">Herman miller</span>
                                    <div>Chief financial</div>
                                </div>
                            </div>
                        </div>
                        <!-- end text slider item -->
                    </div>
                </div>
            </div>
            <div class="col-lg-2 md-mb-25px">
                <div class="d-flex justify-content-center">
                    <!-- start slider navigation -->
                    <div class="slider-one-slide-prev-1 swiper-button-prev slider-navigation-style-04 bg-very-light-gray"><i class="fa-solid fa-arrow-left icon-small text-dark-gray"></i></div>
                    <div class="slider-one-slide-next-1 swiper-button-next slider-navigation-style-04 bg-very-light-gray"><i class="fa-solid fa-arrow-right icon-small text-dark-gray"></i></div>
                    <!-- end slider navigation -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end section -->
<!-- start section -->
<section class="py-0">
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-lg-6 col-md-7 col-sm-8 text-center" data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <h3 class="fw-700 text-dark-gray ls-minus-2px">Our Team</h3>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2" data-anime='{ "el": "childs", "translateX": [-50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
            <!-- start team member item -->
            <div class="col text-center team-style-01 md-mb-30px">
                <figure class="mb-0 hover-box box-hover position-relative">
                    <img src="https://via.placeholder.com/600x756" alt="" class="border-radius-6px" />
                    <figcaption class="w-100 p-30px lg-p-25px bg-white">
                        <div class="position-relative z-index-1 overflow-hidden lg-pb-5px">
                            <span class="fs-19 d-block fw-600 text-dark-gray lh-26 ls-minus-05px">Jeremy dupont</span>
                            <p class="m-0">Executive officer</p>
                            <div class="social-icon hover-text mt-20px lg-mt-10px social-icon-style-05">
                                <a href="https://www.facebook.com/" target="_blank" class="fw-600 text-dark-gray">Fb.</a>
                                <a href="https://www.instagram.com/" target="_blank" class="fw-600 text-dark-gray">In.</a>
                                <a href="https://www.twitter.com/" target="_blank" class="fw-600 text-dark-gray">Tw.</a>
                                <a href="https://dribbble.com/" target="_blank" class="fw-600 text-dark-gray">Dr.</a>
                            </div>
                        </div>
                        <div class="box-overlay bg-white box-shadow-quadruple-large border-radius-6px"></div>
                    </figcaption>
                </figure>
            </div>
            <!-- end team member item -->
            <!-- start team member item -->
            <div class="col text-center team-style-01 md-mb-30px">
                <figure class="mb-0 hover-box box-hover position-relative">
                    <img src="https://via.placeholder.com/600x756" alt="" class="border-radius-6px" />
                    <figcaption class="w-100 p-30px lg-p-25px bg-white">
                        <div class="position-relative z-index-1 overflow-hidden lg-pb-5px">
                            <span class="fs-19 d-block fw-600 text-dark-gray lh-26 ls-minus-05px">Jessica dover</span>
                            <p class="m-0">Vice president</p>
                            <div class="social-icon hover-text mt-20px lg-mt-10px">
                                <a href="https://www.facebook.com/" target="_blank" class="fw-600 text-dark-gray">Fb.</a>
                                <a href="https://www.instagram.com/" target="_blank" class="fw-600 text-dark-gray">In.</a>
                                <a href="https://www.twitter.com/" target="_blank" class="fw-600 text-dark-gray">Tw.</a>
                                <a href="https://dribbble.com/" target="_blank" class="fw-600 text-dark-gray">Dr.</a>
                            </div>
                        </div>
                        <div class="box-overlay bg-white box-shadow-quadruple-large border-radius-6px"></div>
                    </figcaption>
                </figure>
            </div>
            <!-- end team member item -->
            <!-- start team member item -->
            <div class="col text-center team-style-01 xs-mb-30px">
                <figure class="mb-0 hover-box box-hover position-relative">
                    <img src="https://via.placeholder.com/600x756" alt="" class="border-radius-6px" />
                    <figcaption class="w-100 p-30px lg-p-25px bg-white">
                        <div class="position-relative z-index-1 overflow-hidden lg-pb-5px">
                            <span class="fs-19 d-block fw-600 text-dark-gray lh-26 ls-minus-05px">Matthew taylor</span>
                            <p class="m-0">Financial officer</p>
                            <div class="social-icon hover-text mt-20px lg-mt-10px">
                                <a href="https://www.facebook.com/" target="_blank" class="fw-600 text-dark-gray">Fb.</a>
                                <a href="https://www.instagram.com/" target="_blank" class="fw-600 text-dark-gray">In.</a>
                                <a href="https://www.twitter.com/" target="_blank" class="fw-600 text-dark-gray">Tw.</a>
                                <a href="https://dribbble.com/" target="_blank" class="fw-600 text-dark-gray">Dr.</a>
                            </div>
                        </div>
                        <div class="box-overlay bg-white box-shadow-quadruple-large border-radius-6px"></div>
                    </figcaption>
                </figure>
            </div>
            <!-- end team member item -->
            <!-- start team member item -->
            <div class="col text-center team-style-01">
                <figure class="mb-0 hover-box box-hover position-relative">
                    <img src="https://via.placeholder.com/600x756" alt="" class="border-radius-6px" />
                    <figcaption class="w-100 p-30px lg-p-25px bg-white">
                        <div class="position-relative z-index-1 overflow-hidden lg-pb-5px">
                            <span class="fs-19 d-block fw-600 text-dark-gray lh-26 ls-minus-05px">Daniel james</span>
                            <p class="m-0">People officer</p>
                            <div class="social-icon hover-text mt-20px lg-mt-10px">
                                <a href="https://www.facebook.com/" target="_blank" class="fw-600 text-dark-gray">Fb.</a>
                                <a href="https://www.instagram.com/" target="_blank" class="fw-600 text-dark-gray">In.</a>
                                <a href="https://www.twitter.com/" target="_blank" class="fw-600 text-dark-gray">Tw.</a>
                                <a href="https://dribbble.com/" target="_blank" class="fw-600 text-dark-gray">Dr.</a>
                            </div>
                        </div>
                        <div class="box-overlay bg-white box-shadow-quadruple-large border-radius-6px"></div>
                    </figcaption>
                </figure>
            </div>
            <!-- end team member item -->
        </div>
    </div>
</section>
<!-- end section -->
<!-- start section -->
<section class="half-section">
    <div class="container">
        <div class="row justify-content-center mb-30px" data-anime='{ "translateX": [-50, 0], "opacity": [0,1], "duration": 800, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
            <div class="col-lg-5 text-center mb-15px">
                <span class="text-dark-gray fw-600 fs-16 ls-minus-05px text-uppercase border-1 pb-5px border-bottom border-color-extra-medium-gray text-dark-gray">Join the 10,000+ companies using crafto</span>
            </div>
        </div>
        <div class="row position-relative clients-style-08 mb-35px" data-anime='{"translateY": [0, 0], "opacity": [0,1], "duration": 800, "delay": 50, "staggervalue": 150, "easing": "easeOutQuad" }'>
            <div class="col swiper text-center feather-shadow" data-slider-options='{ "slidesPerView": 2, "spaceBetween":0, "speed": 6000, "loop": true, "pagination": { "el": ".slider-four-slide-pagination-2", "clickable": false }, "allowTouchMove": false, "autoplay": { "delay":0, "disableOnInteraction": false }, "navigation": { "nextEl": ".slider-four-slide-next-2", "prevEl": ".slider-four-slide-prev-2" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1200": { "slidesPerView": 5 }, "992": { "slidesPerView": 4 }, "768": { "slidesPerView": 3 } }, "effect": "slide" }'>
                <div class="swiper-wrapper marquee-slide">
                    <!-- start client item -->
                    <div class="swiper-slide">
                        <a href="#"><img src="images/logo-netflix-oxford-blue.svg" class="h-40px xs-h-30px" alt="" /></a>
                    </div>
                    <!-- end client item -->
                    <!-- start client item -->
                    <div class="swiper-slide">
                        <a href="#"><img src="images/logo-invision-oxford-blue.svg" class="h-40px xs-h-30px" alt="" /></a>
                    </div>
                    <!-- end client item -->
                    <!-- start client item -->
                    <div class="swiper-slide">
                        <a href="#"><img src="images/logo-yahoo-oxford-blue.svg" class="h-40px xs-h-30px" alt="" /></a>
                    </div>
                    <!-- end client item -->
                    <!-- start client item -->
                    <div class="swiper-slide">
                        <a href="#"><img src="images/logo-walmart-oxford-blue.svg" class="h-40px xs-h-30px" alt="" /></a>
                    </div>
                    <!-- end client item -->
                    <!-- start client item -->
                    <div class="swiper-slide">
                        <a href="#"><img src="images/logo-logitech-oxford-blue.svg" class="h-40px xs-h-30px" alt="" /></a>
                    </div>
                    <!-- end client item -->
                    <!-- start client item -->
                    <div class="swiper-slide">
                        <a href="#"><img src="images/logo-netflix-oxford-blue.svg" class="h-40px xs-h-30px" alt="" /></a>
                    </div>
                    <!-- end client item -->
                    <!-- start client item -->
                    <div class="swiper-slide">
                        <a href="#"><img src="images/logo-invision-oxford-blue.svg" class="h-40px xs-h-30px" alt="" /></a>
                    </div>
                    <!-- end client item -->
                    <!-- start client item -->
                    <div class="swiper-slide">
                        <a href="#"><img src="images/logo-yahoo-oxford-blue.svg" class="h-40px xs-h-30px" alt="" /></a>
                    </div>
                    <!-- end client item -->
                    <!-- start client item -->
                    <div class="swiper-slide">
                        <a href="#"><img src="images/logo-walmart-oxford-blue.svg" class="h-40px xs-h-30px" alt="" /></a>
                    </div>
                    <!-- end client item -->
                    <!-- start client item -->
                    <div class="swiper-slide">
                        <a href="#"><img src="images/logo-logitech-oxford-blue.svg" class="h-40px xs-h-30px" alt="" /></a>
                    </div>
                    <!-- end client item -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end section -->
@endsection