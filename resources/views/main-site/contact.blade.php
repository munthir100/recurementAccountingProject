@extends('main-site.layouts.shared.app-layout')
@section('title')
@include("main-site.layouts.shared.includes.title-meta", ["title" => __("Contact Us")])
@endsection
@section('content')
<header class="header-with-topbar">
    @include('main-site.layouts.shared.includes.header')
</header>
<section class="top-space-margin half-section bg-gradient-very-light-gray">
    <div class="container">
        <div class="row align-items-center justify-content-center" data-anime='{ "el": "childs", "translateY": [-15, 0], "opacity": [0,1], "duration": 300, "delay": 0, "staggervalue": 200, "easing": "easeOutQuad" }'>
            <div class="col-12 col-xl-8 col-lg-10 text-center position-relative page-title-extra-large">
                <h1 class="alt-font fw-600 text-dark-gray mb-10px">Contact Us</h1>
            </div>
            <div class="col-12 breadcrumb breadcrumb-style-01 d-flex justify-content-center">
                <ul>
                    <li><a href="demo-fashion-store.html">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- start section -->
<section id="down-section">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 row-cols-sm-2 justify-content-center" data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
            <!-- start features box item -->
            <div class="col icon-with-text-style-04 sm-mb-40px">
                <div class="feature-box last-paragraph-no-margin">
                    <div class="feature-box-icon">
                        <i class="line-icon-Geo2-Love icon-extra-large text-base-color mb-25px"></i>
                    </div>
                    <div class="feature-box-content last-paragraph-no-margin">
                        <span class="d-inline-block alt-font fw-600 text-dark-gray mb-5px fs-20">Crafto office</span>
                        <p>401 Broadway, 24th Floor,<br> Orchard View, London, UK</p>
                    </div>
                </div>
            </div>
            <!-- end features box item -->
            <!-- start features box item -->
            <div class="col icon-with-text-style-04 sm-mb-40px">
                <div class="feature-box last-paragraph-no-margin">
                    <div class="feature-box-icon">
                        <i class="line-icon-Headset icon-extra-large text-base-color mb-25px"></i>
                    </div>
                    <div class="feature-box-content last-paragraph-no-margin">
                        <span class="d-inline-block alt-font fw-600 text-dark-gray mb-5px fs-20">Call us directly</span>
                        <div class="w-100 d-block">
                            <span class="d-block">Phone: <a href="tel:1800222000" class="text-base-color-hover">1-800-222-000</a></span>
                            <span class="d-block">Fax: 1-800-222-002</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end features box item -->
            <!-- start features box item -->
            <div class="col icon-with-text-style-04">
                <div class="feature-box last-paragraph-no-margin">
                    <div class="feature-box-icon">
                        <i class="line-icon-Mail-Read icon-extra-large text-base-color mb-25px"></i>
                    </div>
                    <div class="feature-box-content last-paragraph-no-margin">
                        <span class="d-inline-block alt-font fw-600 text-dark-gray mb-5px fs-20">E-mail us</span>
                        <div class="w-100 d-block">
                            <a href="mailto:info@yourdomain.com" class="d-block">info@yourdomain.com</a>
                            <a href="mailto:hr@yourdomain.com" class="d-block">hr@yourdomain.com</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end features box item -->
        </div>
    </div>
</section>
<!-- end section -->
<!-- start section -->
<section class="p-0 h-500px sm-h-350px overlap-height" id="location">
    <div class="container-fluid h-100 overlap-gap-section">
        <div class="row justify-content-center h-100">
            <div class="col-12 p-0">
                <div id="map" class="map h-500px md-h-400px sm-h-350px" data-map-options='{ "lat": -37.805688, "lng": 144.962312, "style": "Silver", "marker": { "type": "HTML", "color": "#005153" }, "popup": { "defaultOpen": true, "html": "<div class=infowindow><strong class=\"mb-3 d-inline-block alt-font\">Crafto Accounting</strong><p class=\"alt-font\">16122 Collins street, Melbourne, Australia</p></div><div class=\"google-maps-link alt-font\"> <a aria-label=\"View larger map\" target=\"_blank\" jstcache=\"31\" href=\"https://maps.google.com/maps?ll=-37.805688,144.962312&amp;z=17&amp;t=m&amp;hl=en-US&amp;gl=IN&amp;mapclient=embed&amp;cid=13153204942596594449\" jsaction=\"mouseup:placeCard.largerMap\">VIEW LARGER MAP</a></div>" } }'></div>
            </div>
        </div>
    </div>
</section>
<!-- end section -->
<!-- start section -->
<section>
    <div class="container overlap-section overlap-section-three-fourth" data-anime='{"el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 800, "delay": 500, "staggervalue": 150, "easing": "easeOutQuad" }'>
        <div class="row row-cols-md-1 justify-content-center">
            <div class="col-xl-10">
                <div class="bg-white p-8 border-radius-6px box-shadow-double-large">
                    <div class="row">
                        <div class="col-9">
                            <h3 class="alt-font text-dark-gray fw-700 ls-minus-2px mb-50px xs-mb-35px">How we can help you?</h3>
                        </div>
                        <div class="col-3 text-end" data-anime='{ "translateY": [30, 0], "translateX": [-30, 0], "opacity": [0,1], "duration": 600, "delay": 300, "staggervalue": 300, "easing": "easeOutQuad" }'>
                            <i class="bi bi-send icon-large text-dark-gray animation-zoom"></i>
                        </div>
                    </div>
                    <!-- start contact form -->
                    <form action="email-templates/contact-form.php" method="post" class="row contact-form-style-02">
                        <div class="col-md-6 mb-30px">
                            <input class="input-name form-control required" type="text" name="name" placeholder="Your name*" />
                        </div>
                        <div class="col-md-6 mb-30px">
                            <input class="form-control required" type="email" name="email" placeholder="Your email address*" />
                        </div>
                        <div class="col-md-6 mb-30px">
                            <input class="form-control" type="tel" name="phone" placeholder="Your phone" />
                        </div>
                        <div class="col-md-6 mb-30px">
                            <input class="form-control" type="text" name="subject" placeholder="Your subject" />
                        </div>
                        <div class="col-md-12 mb-30px">
                            <textarea class="form-control" cols="40" rows="4" name="message" placeholder="Your message"></textarea>
                        </div>
                        <div class="col-xl-7 col-md-7 last-paragraph-no-margin">
                            <p class="text-center text-md-start fs-15 lh-26">We are committed to protecting your privacy. We will never collect information about you without your explicit consent.</p>
                        </div>
                        <div class="col-xl-5 col-md-5 text-center text-md-end sm-mt-20px">
                            <input type="hidden" name="redirect" value="">
                            <button class="btn btn-base-color btn-medium btn-rounded btn-box-shadow submit" type="submit">Send message</button>
                        </div>
                        <div class="col-12">
                            <div class="form-results mt-20px d-none"></div>
                        </div>
                    </form>
                    <!-- end contact form -->
                </div>
            </div>
            <div class="row align-items-center justify-content-center mt-8">
                <div class="col-md-auto text-center text-md-end sm-mb-20px">
                    <h6 class="text-dark-gray fw-600 mb-0 ls-minus-1px">Connect with social media </h6>
                </div>
                <div class="col-2 d-none d-lg-inline-block">
                    <span class="w-100 h-1px bg-dark-gray opacity-2 d-flex mx-auto"></span>
                </div>
                <!-- start social icon -->
                <div class="col-md-auto elements-social social-icon-style-04 text-center text-md-start ps-lg-0">
                    <ul class="large-icon dark">
                        <li class="m-0"><a class="facebook" href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f"></i><span></span></a></li>
                        <li class="m-0"><a class="dribbble" href="http://www.dribbble.com" target="_blank"><i class="fa-brands fa-dribbble"></i><span></span></a></li>
                        <li class="m-0"><a class="twitter" href="http://www.twitter.com" target="_blank"><i class="fa-brands fa-twitter"></i><span></span></a></li>
                        <li class="m-0"><a class="instagram" href="http://www.instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i><span></span></a></li>
                    </ul>
                </div>
                <!-- end social icon -->
            </div>
        </div>
    </div>
</section>
@endsection