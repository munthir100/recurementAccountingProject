<div class="header-top-bar top-bar-dark bg-very-light-gray">
    <div class="container-fluid">
        <div class="row h-45px xs-h-auto align-items-center m-0 xs-pt-5px xs-pb-5px">
            <div class="col-lg-6 col-md-7 text-center text-md-start xs-px-0">
                <div class="fs-15 text-dark-gray fw-500">{{ $siteSettings['main_site']['top_bar']['text'] }}
                    <a href="demo-accounting-contact.html" class="text-dark-gray text-decoration-line-bottom fw-600">
                        Contact now
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-5 text-end d-none d-md-flex">
                <div class="widget fs-15 fw-500 me-35px lg-me-25px md-me-0 text-dark-gray">
                    <a href="tel:{{ $siteSettings['main_site']['top_bar']['phone'] }}">
                        <i class="feather icon-feather-phone-call"></i>{{ $siteSettings['main_site']['top_bar']['phone'] }}
                    </a>
                </div>
                <div class="widget fs-15 fw-500 text-dark-gray d-none d-lg-inline-block">
                    <i class="feather icon-feather-map-pin"></i>{{ $siteSettings['main_site']['top_bar']['address'] }}
                </div>
            </div>
        </div>
    </div>
</div>