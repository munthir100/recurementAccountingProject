@extends('main-site.layouts.shared.app-layout')
@section('title')
@include("main-site.layouts.shared.includes.title-meta", ["title" => __("Home")])
@endsection
@section('content')
<header class="header-with-topbar">
    @include('main-site.layouts.shared.includes.header')
</header>
<!-- start page title -->
<section class="top-space-margin half-section bg-gradient-very-light-gray">
    <div class="container">
        <div class="row align-items-center justify-content-center" data-anime='{ "el": "childs", "translateY": [-15, 0], "opacity": [0,1], "duration": 300, "delay": 0, "staggervalue": 200, "easing": "easeOutQuad" }'>
            <div class="col-12 col-xl-8 col-lg-10 text-center position-relative page-title-extra-large">
                <h1 class="alt-font fw-600 text-dark-gray mb-10px">Workers</h1>
            </div>
            <div class="col-12 breadcrumb breadcrumb-style-01 d-flex justify-content-center">
                <ul>
                    <li><a href="demo-fashion-store.html">Home</a></li>
                    <li>Workers</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- end page title -->
<section class="section" id="findJob">
    <div class="container-fluid bg-grey">
        <div class="row">
            @forelse($workers as $worker)
            <div class="col-md-4 mb-2">
                <div class="row g-0 box-shadow-extra-large box-shadow-quadruple-large-hover border-radius-6px overflow-hidden">
                    <div class="col-5 cover-background" style="background-image: url(dashboard/assets/images/users/avatar-1.jpg)">
                    </div>
                    <div class="col-7 bg-white ps-35px pt-30px pb-30px xs-ps-20px">
                        <a href="{{route('home.workers.show',$worker->id)}}">
                            <span class="primary-font fs-18 fw-600 text-dark-gray d-block">
                                {{$worker->first_name}} {{$worker->last_name}}
                            </span>
                        </a>
                        <span class="fs-16 lh-22 d-block">{{$worker->job}}</span>
                        <div class="h-1px w-100 bg-extra-medium-gray mt-15px mb-10px"></div>
                        <div class="row">

                            <div class="col-12">
                                <i class="far fa-calendar-check"></i>&nbsp;
                                 &nbsp;
                                {{date("F j, Y", strtotime($worker->created_at)) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="container">

                <div class="alert border-0 alert-danger" role="alert">
                    <strong> {{ __('No items Found') }} </strong>
                </div>
            </div>
            @endforelse

            <div class="d-flex justify-content-center">
                <x-main-site.pagination :model="$workers" />
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('dashboard/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{asset('dashboard/assets/js/actions/delete-items.js')}}"></script>
@endsection