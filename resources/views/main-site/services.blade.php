@extends('main-site.layouts.shared.app-layout')

@section('title')
@include("main-site.layouts.shared.includes.title-meta", ["title" => __("Our Services")])
@endsection

@section('content')
<header class="header-with-topbar">
    @include('main-site.layouts.shared.includes.header')
</header>

<x-main-site.page-header title="{{ __('Our Services') }}" />
<!-- end page title -->
<!-- start section -->
<section class="bg-very-light-gray">
    <div class="container">

        <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 justify-content-center" data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
            <!-- start features box item -->
            @foreach($services as $service)
            <div class="col icon-with-text-style-07 transition-inner-all mb-30px">
                <div class="bg-white h-100 justify-content-end box-shadow-quadruple-large-hover feature-box flex-column-reverse p-15 md-p-13 border-radius-8px">
                    <div class="feature-box-icon">
                        <a href="#"><img src="/images/demo-accounting-company-icon01.svg" class="h-95px" alt=""></a>
                    </div>
                    <div class="feature-box-content">
                        <a href="#" class="d-inline-block fw-600 text-dark-gray mb-5px fs-20 ls-minus-05px">{{$service->title}}</a>
                        <p class="mb-30px">{{$service->description}}</p>
                        @if($service->is_new)
                        <span class="position-absolute box-shadow-large top-25px lg-top-15px right-25px lg-right-15px bg-base-color border-radius-18px text-white fs-11 fw-600 text-uppercase ps-15px pe-15px lh-26 ls-minus-05px">{{__('New')}}</span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            <!-- end features box item -->

        </div>
    </div>
</section>

@endsection