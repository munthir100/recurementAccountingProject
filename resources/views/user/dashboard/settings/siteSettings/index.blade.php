@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __('Settings')])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __('Account'), "title" => __('Settings')])
@endsection

@section('content')


<div class="container">
    <div class="row">
        <!-- Card 1 -->

        <div class="col-md-3">
            <div class="card text-center">
                <a href="{{route('user.dashboard.settings.siteSettings.topBar')}}">
                    <div class="card-body mb-4">
                        <div class="card-icon display-4">
                            <i class="ri-home-3-line text-primary"></i>
                        </div>
                        <h5 class="card-title mb-2">{{ __('Top Bar') }}</h5>
                        <p class="card-text text-muted">{{ __('edit on top bar contents and visibility') }}</p>
                    </div>
                </a>
            </div>
        </div>




        <div class="col-md-3">
            <div class="card text-center">
                <a href="{{route('user.dashboard.settings.siteSettings.banner')}}">
                    <div class="card-body mb-4">
                        <div class="card-icon display-4">
                            <i class="ri-home-3-line text-primary"></i>
                        </div>
                        <h5 class="card-title mb-2">{{ __('Banner') }}</h5>
                        <p class="card-text text-muted">{{ __('edit on the banner items and photos') }}</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center">
                <a href="{{route('user.dashboard.settings.siteSettings.genralData')}}">
                    <div class="card-body mb-4">
                        <div class="card-icon display-4">
                            <i class="ri-home-3-line text-primary"></i>
                        </div>
                        <h5 class="card-title mb-2">{{ __('Main Settings') }}</h5>
                        <p class="card-text text-muted">{{ __('Logo , Icon , Site Name') }}</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center">
                <a href="{{route('user.dashboard.settings.siteSettings.services.index')}}">
                    <div class="card-body mb-4">
                        <div class="card-icon display-4">
                            <i class="ri-home-3-line text-primary"></i>
                        </div>
                        <h5 class="card-title mb-2">{{ __('Site Services') }}</h5>
                        <p class="card-text text-muted">{{ __('create , update , delete services') }}</p>
                    </div>
                </a>
            </div>
        </div>




    </div>
</div>

@endsection