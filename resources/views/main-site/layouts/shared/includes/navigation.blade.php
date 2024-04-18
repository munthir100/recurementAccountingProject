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
            <button class="navbar-toggler float-start" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                <span class="navbar-toggler-line"></span>
                <span class="navbar-toggler-line"></span>
                <span class="navbar-toggler-line"></span>
                <span class="navbar-toggler-line"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav fw-600">
                    <li class="nav-item"><a href="{{ route('home.index') }}" class="nav-link">Home</a></li>
                    <li class="nav-item dropdown dropdown-with-icon-style02">
                        <a href="#" class="nav-link">Our Services</a>
                        <i class="fa-solid fa-angle-down dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a href="#"><img src="/images/demo-accounting-company-icon02.svg" alt="">Recruitment Procedures</a></li>
                            <li><a href="#"><img src="/images/demo-accounting-company-icon03.svg" alt="">Worker Selection</a></li>
                            <li><a href="#"><img src="/images/demo-accounting-company-icon-04.svg" alt="">Recruitment Contracting</a></li>
                            <li><a href="#"><img src="/images/demo-accounting-company-icon-05.svg" alt="">Recruitment Policies</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link">Recruitment Journey</a></li>
                    <li class="nav-item dropdown dropdown-with-icon-style02">
                        <a href="#" class="nav-link">Pages</a>
                        <i class="fa-solid fa-angle-down dropdown-toggle" id="pages" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                        <ul class="dropdown-menu" aria-labelledby="pages">
                            <li><a href="{{ route('home.blog') }}" class="dropdown-item">Blog</a></li>
                            <li><a href="{{ route('home.about') }}" class="dropdown-item">About</a></li>
                            <li><a href="{{ route('home.contact') }}" class="dropdown-item">Contact Us</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="{{ route('home.workers') }}" class="nav-link">Workers</a></li>
                    @auth('account')
                    @if(request()->user('account')->isOfficeAccount)
                    <li class="nav-item">
                        <a href="#modal-popup4" class="btn-hover-animation-switch slide-up-animation btn btn-link btn-hover-animation-switch btn-large fw-700 text-base-color">
                            <span>
                                <span class="btn-text">Upload CV</span>
                                <span class="btn-icon"><i class="fa-solid fa-file-arrow-up"></i></span>
                                <span class="btn-icon"><i class="fa-solid fa-file-arrow-up"></i></span>
                            </span>
                        </a>
                    </li>

                    <div id="modal-popup4" class="slide-up-popup mfp-hide col-xl-4 col-lg-6 col-md-7 col-11 mx-auto bg-white text-center modal-popup-main">
                        <span class="text-dark-gray fw-600 fs-24 mb-10px d-block">Upload CV</span>
                        <form action="{{route('account.office.cv.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 text-start">
                                <label for="cv" class="form-label">Select a CV</label>
                                <input type="file" class="form-control" id="cv" name="cv" accept=".doc,.docx,.pdf" required>
                                @error('cv')
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-small btn-rounded btn-dark-gray mt-10px">Upload</button>
                        </form>
                    </div>
                    @endif
                    @endauth
                </ul>
            </div>
        </div>
        <div class="col-auto col-lg-2 text-end d-none d-sm-flex">
            <div class="header-icon">
                <div class="header-button">
                    @guest('account')
                    <a href="{{ route('account.login') }}" class="btn btn-small btn-rounded btn-base-color btn-box-shadow">Log In</a>
                    @else
                    <a class="btn btn-small btn-rounded btn-base-color btn-box-shadow" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">Logout</a>
                    <form id="logoutForm" action="{{ route('account.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endguest
                </div>
            </div>
        </div>
    </div>
    <form id="logoutForm" action="{{ route('account.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</nav>