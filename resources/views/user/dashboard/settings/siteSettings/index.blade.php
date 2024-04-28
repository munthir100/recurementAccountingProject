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




    </div>
</div>

@endsection
