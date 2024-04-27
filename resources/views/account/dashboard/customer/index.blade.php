@extends('account.dashboard.layouts.shared.app-layout')

@section('title')
@include("account.dashboard.layouts.shared.includes.title-meta", ["title" => __("Dashboard")])
@endsection

@section('styles')
<!-- Additional styles for this page -->
@endsection

@section('page-title')
@include("account.dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Account"), "title" => __("Home")])
@endsection

@section('content')
<div class="row">
    <div class="col-xl-6">
        <div class="d-flex flex-column h-100">
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> New Orders</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{$newOrders}}">{{$newOrders}}</span></h4>
                                    <a href="{{route('account.dashboard.customer.orders.index',[ 'status' => 'new' ])}}" class="text-decoration-underline">{{__('View')}}</a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-primary-subtle rounded fs-3">
                                        <i class="bx bxs-shopping-bags text-primary"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!--end col-->
                <div class="col-xl-6 col-md-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> {{__('Pending')}}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{$pendingOrders}}">{{$pendingOrders}}</span></h4>
                                    <a href="{{route('account.dashboard.customer.orders.index',[ 'status' => 'pending' ])}}" class="text-decoration-underline">{{__('View')}}</a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-warning-subtle rounded fs-3">
                                        <i class="bx bxs-shopping-bags text-warning"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!--end col-->
                <div class="col-xl-6 col-md-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Processing Orders</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{$processingOrders}}">{{$processingOrders}}</span></h4>
                                    <a href="{{route('account.dashboard.customer.orders.index',[ 'status' => 'processing' ])}}" class="text-decoration-underline">{{__('View')}}</a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-secondary-subtle rounded fs-3">
                                        <i class="bx bxs-shopping-bags text-secondary"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!--end col-->
                <div class="col-xl-6 col-md-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Cancelled Orders</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{$cancelledOrders}}">{{$cancelledOrders}}</span></h4>
                                    <a href="{{route('account.dashboard.customer.orders.index',[ 'status' => 'cancelled' ])}}" class="text-decoration-underline">{{__('View')}}</a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-danger-subtle rounded fs-3">
                                        <i class="bx bxs-shopping-bags text-danger"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!--end col-->
                <div class="col-xl-6 col-md-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Delivered Orders</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{$deliveredOrders}}">{{$deliveredOrders}}</span></h4>
                                    <a href="{{route('account.dashboard.customer.orders.index',[ 'status' => 'delivered' ])}}" class="text-decoration-underline">{{__('View')}}</a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-info-subtle rounded fs-3">
                                        <i class="bx bxs-shopping-bags text-info"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!--end col-->

                <div class="col-xl-6 col-md-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Completed Orders</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{$completedOrders}}">{{$completedOrders}}</span></h4>
                                    <a href="{{route('account.dashboard.customer.orders.index',[ 'status' => 'completed' ])}}" class="text-decoration-underline">{{__('View')}}</a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-success-subtle rounded fs-3">
                                        <i class="bx bxs-shopping-bags text-success"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </div><!--end col-->
    <div class="col-xl-6">
        <div class="card card-height-100">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">My Orders</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-centered table-hover align-middle table-nowrap mb-0">
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-xs me-2 flex-shrink-0">
                                            <div class="avatar-title bg-secondary-subtle rounded">
                                                @php
                                                $src = $order->worker->hasMedia('main_images') ? $order->worker->getFirstMedia('main_images')->getUrl() : 'https://via.placeholder.com/300x300';
                                                @endphp
                                                <img src="{{$src}}" alt="" height="16">
                                            </div>
                                        </div>
                                        <h6 class="mb-0">
                                            <a href="{{route('home.workers.show',$order->worker->id)}}" target="__blank">
                                                {{$order->worker->first_name}} {{$order->worker->last_name}}
                                            </a>
                                        </h6>
                                    </div>
                                </td>
                                <td>
                                    <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i> Cullera, Spain
                                </td>
                                <td>
                                    {{$order->contract_type}}
                                </td>
                                <td>
                                    <a href="{{route('account.dashboard.customer.orders.show',$order->id)}}" class="btn btn-link btn-sm">View <i class="ri-arrow-right-line align-bottom"></i></a>
                                </td>
                            </tr>


                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="align-items-center mt-4 pt-2 justify-content-between d-md-flex">
                    <div class="flex-shrink-0 mb-2 mb-md-0">
                        <div class="text-muted">
                            Showing <span class="fw-semibold">6</span> of <span class="fw-semibold">{{$totalOrders}}</span> Results
                        </div>
                    </div>
                    <a href="{{route('account.dashboard.customer.orders.index')}}" class="btn btn-link btn-sm">View More <i class="ri-arrow-right-line align-bottom"></i></a>
                </div>
            </div>
        </div> <!-- .card-->
    </div><!--end col-->
</div><!--end row-->

@endsection
@section('styles')

@endsection
@section('scripts')

@endsection