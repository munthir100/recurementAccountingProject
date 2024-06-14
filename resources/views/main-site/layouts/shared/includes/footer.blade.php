<footer class="footer-dark bg-dark-gray pt-0 pb-2 lg-pb-35px">
    <div class="footer-top pt-50px pb-50px sm-pt-35px sm-pb-35px border-bottom border-1 border-color-transparent-white-light">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <!-- start footer column -->
                <div class="col-xl-6 text-center text-xl-start lg-mb-30px sm-mb-20px">
                    <h3 class="text-white mb-5px fw-500 ls-minus-1px">{{__('For more information')}}</h3>
                </div>
                <!-- end footer column -->
                <!-- start footer column -->
                <div class="col-xl-6 text-center text-xl-end">
                    <a href="mailto:{{$siteSettings->contact_email}}" class="btn btn-large btn-yellow left-icon btn-box-shadow btn-rounded text-transform-none d-inline-block align-middle me-15px xs-m-10px">
                        <i class="feather icon-feather-mail"></i>{{$siteSettings->contact_email}}
                    </a>
                    <a href="tel:{{$siteSettings->contact_phone}}" class="btn btn-large btn-base-color left-icon btn-box-shadow btn-rounded d-inline-block align-middle xs-m-10px">
                        <i class="feather icon-feather-phone-call"></i>{{$siteSettings->contact_phone}}
                    </a>
                </div>
                <!-- end footer column -->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center fs-17 fw-300 mt-5 mb-4 md-mt-45px md-mb-45px xs-mt-35px xs-mb-35px">
            <!-- start footer column -->
            <div class="col-6 col-lg-3 order-sm-1 md-mb-40px xs-mb-30px last-paragraph-no-margin">
                <span class="fs-18 fw-400 d-block text-white mb-5px">{{$siteSettings->name}}</span>
                <p class="w-85 xl-w-95 sm-w-100" style="text-align: right;">{{$siteSettings->description}}</p>
                <div class="elements-social social-icon-style-02 mt-20px lg-mt-20px">
                    <ul class="small-icon light">
                        <li><a class="facebook" href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a class="dribbble" href="http://www.dribbble.com" target="_blank"><i class="fa-brands fa-dribbble"></i></a></li>
                        <li><a class="twitter" href="http://www.twitter.com" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a class="instagram" href="http://www.instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- end footer column -->
            <!-- start footer column -->
            <div class="col-6 col-lg-2 col-sm-4 xs-mb-30px order-sm-3 order-lg-2">
                <span class="fs-18 fw-400 d-block text-white mb-5px">{{__('About Us')}}</span>
                <ul>
                    <li><a href="#">{{__('Office')}}</a></li>
                    <li><a href="#">{{__('Our Services')}}</a></li>
                    <li><a href="#">{{__('Technical Support')}}</a></li>
                    <li><a href="#">{{__('Contact Us')}}</a></li>
                </ul>
            </div>
            <!-- end footer column -->
            <!-- start footer column -->
            <div class="col-6 col-lg-2 col-sm-4 xs-mb-30px order-sm-4 order-lg-3">
                <span class="fs-18 fw-400 d-block text-white mb-5px">{{__('Our Services')}}</span>
                <ul>
                    <li><a href="#">{{__('Recruitment Procedures')}}</a></li>
                    <li><a href="#">{{__('Employee Selection')}}</a></li>
                    <li><a href="#">{{__('Recruitment Contracts')}}</a></li>
                    <li><a href="#">{{__('Recruitment Policies')}}</a></li>
                </ul>
            </div>
            <!-- end footer column -->
            <!-- start footer column -->
            <div class="col-6 col-lg-2 col-sm-4 xs-mb-30px order-sm-5 order-lg-4">
                <span class="fs-18 fw-400 d-block text-white mb-5px">{{__('Stay Connected')}}</span>
                <p class="mb-5px">{{__('Do you need help?')}}</p>
                <a href="mailto:{{$siteSettings->contact_email}}" class="text-white lh-16 d-block mb-15px">{{$siteSettings->contact_email}}</a>
                <p class="mb-5px">{{__('Technical Support?')}}</p>
                <a href="tel:12345678910" class="text-white lh-16 d-block">{{$siteSettings->contact_phone}}</a>
            </div>
            <!-- end footer column -->
            <!-- start footer column -->
            <div class="col-lg-3 col-sm-6 md-mb-40px xs-mb-0 order-sm-2 order-lg-5">
                <span class="fs-18 fw-400 d-block text-white mb-5px">{{__('Subscribe to Newsletter')}}</span>
                <p class="mb-20px">{{__('Enter your email and we\'ll reach out to you!')}}</p>
                <div class="d-inline-block w-100 newsletter-style-02 position-relative">
                    <form action="email-templates/subscribe-newsletter.php" method="post" class="position-relative">
                        <input class="border-color-transparent-white-light bg-transparent border-radius-4px w-100 form-control lg-ps-15px required fs-16" type="email" name="email" placeholder="{{__('Enter your email')}}" />
                        <input type="hidden" name="redirect" value="">
                        <button class="btn pe-20px submit" aria-label="submit">
                            <i class="bi bi-envelope icon-small text-white"></i>
                        </button>
                        <div class="form-results border-radius-4px pt-5px pb-5px ps-15px pe-15px fs-14 lh-22 mt-10px w-100 text-center position-absolute d-none"></div>
                    </form>
                </div>
            </div>
            <!-- end footer column -->
        </div>
        <div class="row align-items-center fs-16 fw-300">
            <!-- start copyright -->
            <div class="col-md-4 last-paragraph-no-margin order-2 order-md-1 text-center text-md-start">
                <p>&COPY; {{__('All rights reserved')}} 2024 <a href="#" target="_blank" class="text-decoration-line-bottom text-white">{{__('Office')}}</a></p>
            </div>
            <!-- end copyright -->
            <!-- start footer menu -->
            <div class="col-md-8 text-md-end order-1 order-md-2 text-center text-md-end sm-mb-10px">
                <ul class="footer-navbar sm-lh-normal">
                    <li><a href="#" class="nav-link">{{__('Usage Policy')}}</a></li>
                    <li><a href="#" class="nav-link">{{__('Terms and Conditions')}}</a></li>
                    <li><a href="#" class="nav-link">{{__('Recruitment Terms')}}</a></li>
                </ul>
            </div>
            <!-- end footer menu -->
        </div>
    </div>
</footer>