@extends('main-site.layouts.shared.app-layout')
@section('title')
@include("main-site.layouts.shared.includes.title-meta", ["title" => __("Home")])
@endsection
@section('content')
<header class="header-with-topbar">
    @include('main-site.layouts.shared.includes.header')
</header>

<x-main-site.page-header title="My Account" />

<section class="pt-0">
    <div class="container">
        <div class="row g-0 justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-10 contact-form-style-04 md-mb-50px" data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 600, "delay":100, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <span class="fs-26 xs-fs-24 alt-font fw-600 text-dark-gray mb-20px d-block">Member login</span>
                <form action="{{ route('account.login.submit') }}" method="post">
                    @csrf
                    <label class="text-dark-gray mb-10px fw-500">email address<span class="text-red">*</span></label>
                    <input class="mb-20px bg-very-light-gray form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Enter your email" />
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <label class="text-dark-gray mb-10px fw-500">Password<span class="text-red">*</span></label>
                    <input class="mb-20px bg-very-light-gray form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Enter your password" />
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="position-relative terms-condition-box text-start d-flex align-items-center mb-20px">
                        <label>
                            <input type="checkbox" name="terms_condition" id="terms_condition" value="1" class="terms-condition check-box align-middle required">
                            <span class="box fs-14">Remember me</span>
                        </label>
                        <a href="#" class="fs-14 text-dark-gray fw-500 text-decoration-line-bottom ms-auto">Forget your password?</a>
                    </div>
                    <input type="hidden" name="redirect" value="">
                    <button class="btn btn-medium btn-round-edge btn-dark-gray btn-box-shadow w-100" type="submit">Login</button>
                    <div class="form-results mt-20px d-none"></div>
                </form>
            </div>

            <div class="col-lg-6 col-md-10 offset-xl-2 offset-lg-1 p-6 box-shadow-extra-large border-radius-6px" data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 600, "delay":150, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <span class="fs-26 xs-fs-24 alt-font fw-600 text-dark-gray mb-20px d-block">Create an account</span>
                <form action="{{ route('account.register.submit') }}" method="post">
                    @csrf

                    <!-- Username field -->
                    <label class="text-dark-gray mb-10px fw-500">Username<span class="text-red">*</span></label>
                    <input class="mb-20px bg-very-light-gray form-control @error('name') is-invalid @enderror" name="name" type="text" placeholder="Enter your username" value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <!-- Email address field -->
                    <label class="text-dark-gray mb-10px fw-500">Email address<span class="text-red">*</span></label>
                    <input class="mb-20px bg-very-light-gray form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <!-- Phone field -->
                    <label class="text-dark-gray mb-10px fw-500">Phone<span class="text-red">*</span></label>
                    <input class="mb-20px bg-very-light-gray form-control @error('phone') is-invalid @enderror" type="text" name="phone" placeholder="Enter your phone number" value="{{ old('phone') }}">
                    @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <!-- Password field -->
                    <label class="text-dark-gray mb-10px fw-500">Password<span class="text-red">*</span></label>
                    <input class="mb-20px bg-very-light-gray form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Enter your password">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <!-- Privacy policy notice -->
                    <span class="fs-13 lh-22 w-90 lg-w-100 md-w-90 sm-w-100 d-block mb-30px">Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="#" class="text-dark-gray text-decoration-line-bottom fw-500">privacy policy.</a></span>

                    <!-- Hidden input for redirect -->
                    <input type="hidden" name="redirect" value="">

                    <!-- Submit button -->
                    <button class="btn btn-medium btn-round-edge btn-dark-gray btn-box-shadow w-100" type="submit">Register</button>

                    <!-- Form results (for potential use) -->
                    <div class="form-results mt-20px d-none"></div>
                </form>

            </div>
        </div>
    </div>
</section>
<!-- end section -->
@endsection