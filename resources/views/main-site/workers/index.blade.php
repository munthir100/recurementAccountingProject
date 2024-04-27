@extends('main-site.layouts.shared.app-layout')
@section('title')
@include("main-site.layouts.shared.includes.title-meta", ["title" => __("Home")])
@endsection
@section('content')
<header class="header-with-topbar">
    @include('main-site.layouts.shared.includes.header')
</header>
<!-- start page title -->
<x-main-site.page-header title="Workers" />

<x-main-site.search-bar />

<!-- end page title -->
<section class="section" id="findJob">
    <div class="container-fluid bg-grey">
        <div class="row">
            <x-main-site.search-result-text />
            @forelse($workers as $worker)
            <div class="col-md-4 mb-2">
                <div class="row g-0 box-shadow-extra-large box-shadow-quadruple-large-hover border-radius-6px overflow-hidden">
                    @php
                    $src = $worker->hasMedia('main_images') ? $worker->getFirstMedia('main_images')->getUrl() : 'https://via.placeholder.com/300x300';
                    @endphp

                    <div class="col-5 cover-background" style=" background-image: url('{{ $src }}')">
                    </div>

                    <div class="col-7 bg-white ps-35px pt-30px pb-30px xs-ps-20px text-center">
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