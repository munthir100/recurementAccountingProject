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
                <div class="col-md-3">
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

                <div class="col-md-3">
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

                <div class="col-md-3">
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

                <div class="col-md-3">
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
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">{{__('Recent Orders')}}</h4>
                <div class="flex-shrink-0">
                    <a href="{{__('View All')}}" class="btn btn-soft-info btn-sm">
                        <i class="ri-eye-line align-middle"></i> {{__('View All')}}
                    </a>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-nowrap table-striped-columns align-middle mb-0">
                        <thead class="text-muted table-light">
                            <tr>
                                <th scope="col">{{__('Order ID')}}</th>
                                <th scope="col">{{__('Customer')}}</th>
                                <th scope="col">{{__('Worker')}}</th>
                                <th scope="col">{{__('Amount')}}</th>
                                <th scope="col">{{__('Contract Type')}}</th>
                                <th scope="col">{{__('Status')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentOrders as $order)
                            <tr>
                                <td>
                                    <a href="{{route('user.dashboard.orders.show',$order->id)}}" class="fw-medium link-primary">{{$order->id}}</a>
                                </td>
                                <td>
                                    {{$order->account->name}}
                                </td>
                                <td>{{$order->worker->first_name}} {{$order->worker->last_name}}</td>
                                <td>
                                    <span class="text-success">SAR {{$order->amount}}</span>
                                </td>
                                <td>{{$order->contract_type}}</td>
                                <td>
                                <x-dashboard.table-status-badge :statusId="$order->status_id" />
                                </td>
                            </tr><!-- end tr -->
                            @endforeach
                        </tbody><!-- end tbody -->
                    </table><!-- end table -->
                </div>
            </div>
        </div> <!-- .card-->
    </div> <!-- .col-->
</div>

@endsection

@section('scripts')

@endsection