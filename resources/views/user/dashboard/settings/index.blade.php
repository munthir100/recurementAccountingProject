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
                <a href="{{route('user.dashboard.settings.genral')}}">
                    <div class="card-body mb-4">
                        <div class="card-icon display-4">
                            <i class="ri-home-3-line text-primary"></i>
                        </div>
                        <h5 class="card-title mb-2">{{ __('Genral Settings') }}</h5>
                        <p class="card-text text-muted">{{ __('update personal data') }}</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center">
                <a href="{{route('user.dashboard.settings.countries.index')}}">
                    <div class="card-body mb-4">
                        <div class="card-icon display-4">
                            <i class="ri-flag-line text-primary"></i>
                        </div>
                        <h5 class="card-title mb-2">{{ __('Countries') }}</h5>
                        <p class="card-text text-muted">{{ __('Generate available countries') }}</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center">
                <a href="{{route('user.dashboard.settings.siteSettings.index')}}">
                    <div class="card-body mb-4">
                        <div class="card-icon display-4">
                            <i class="ri-layout-line text-primary"></i>
                        </div>
                        <h5 class="card-title mb-2">{{ __('Site Settings') }}</h5>
                        <p class="card-text text-muted">{{ __('top bar , contact information and more') }}</p>
                    </div>
                </a>
            </div>
        </div>


    </div>
</div>

@endsection