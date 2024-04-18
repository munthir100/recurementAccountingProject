@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Dashboard")])
@endsection

@section('styles')
<!-- Additional styles for this page -->
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Account"), "title" => __("Home")])
@endsection

@section('content')
<div class="row">
    <div class="col-xxl-5">
        <div class="d-flex flex-column h-100">

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">{{ __("Customers") }}</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold">
                                        <span class="counter-value" data-target="{{$customersCount}}">{{$customersCount}}</span>
                                    </h2>

                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0 mb-2">
                                        <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                            <i class="ri-headphone-line text-info"></i>
                                        </span>
                                    </div>
                                    <a href="{{route('user.dashboard.customers.index')}}" class="card-link link-secondary">
                                        {{ __("View") }}<i class="ri-arrow-right-s-line ms-1 align-middle lh-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-md-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">{{ __("Office") }}</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold">
                                        <span class="counter-value" data-target="{{ $officesCount }}">{{ $officesCount }}</span>
                                    </h2>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0 mb-2">
                                        <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                            <i class="ri-briefcase-line text-info"></i>
                                        </span>
                                    </div>
                                    <a href="{{route('user.dashboard.offices.index')}}" class="card-link link-secondary">
                                        {{ __("View") }}<i class="ri-arrow-right-s-line ms-1 align-middle lh-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row-->

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">{{ __("Worker") }}</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold">
                                        <span class="counter-value" data-target="{{ $workersCount }}">0</span>
                                    </h2>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0 mb-2">
                                        <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                            <i class="ri-user-2-line text-info"></i>
                                        </span>
                                    </div>
                                    <a href="{{route('user.dashboard.workers.index')}}" class="card-link link-secondary">
                                        {{ __("View") }}<i class="ri-arrow-right-s-line ms-1 align-middle lh-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-md-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">{{ __("New Cvs") }}</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold">
                                        <span class="counter-value" data-target="{{ $cvsCount }}">0</span>
                                    </h2>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0 mb-2">
                                        <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                            <i class="ri-newspaper-line text-info"></i>
                                        </span>
                                    </div>
                                    <a href="{{route('user.dashboard.cvs.index')}}" class="card-link link-secondary">
                                        {{ __("View") }}<i class="ri-arrow-right-s-line ms-1 align-middle lh-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row-->
        </div>
    </div> <!-- end col-->
</div> <!-- end row-->
@endsection

@section('scripts')

@endsection