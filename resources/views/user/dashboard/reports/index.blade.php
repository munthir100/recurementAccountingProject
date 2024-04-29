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




<div class="container-fluid">

    <div class="row">
        <div class="col">

            <div class="h-100">
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <!-- Total Transactions Card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">{{__('Total Transactions')}}</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-18 fw-semibold ff-secondary mb-4"> {{ $totalTransactions }} {{__('SAR')}}</h4>
                                        <a href="{{route('user.dashboard.reports.transactions.index')}}" class="text-decoration-underline">{{__('View Transactions')}}</a>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle rounded fs-3">
                                            <i class="bx bx-dollar-circle text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <!-- Total Orders Card -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">{{__('Total Orders')}}</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-18 fw-semibold ff-secondary mb-4"> {{ $totalOrder }} {{__('SAR')}}</h4>
                                        <a href="{{route('user.dashboard.reports.orders.index')}}" class="text-decoration-underline">{{__('View orders')}}</a>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle rounded fs-3">
                                            <i class="bx bx-cart text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <!-- Total Invoices Card -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">{{__('Total Invoices')}}</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-18 fw-semibold ff-secondary mb-4"> {{ $totalInvoice }} {{__('SAR')}}</h4>
                                        <a href="{{route('user.dashboard.reports.invoices.index')}}" class="text-decoration-underline">{{__('View invoices')}}</a>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle rounded fs-3">
                                            <i class="bx bx-receipt text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <!-- Total Bonds Card -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">{{__('Total Bonds')}}</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-18 fw-semibold ff-secondary mb-4"> {{ $totalBond }} {{__('SAR')}}</h4>
                                        <a href="{{route('user.dashboard.reports.bonds.index')}}" class="text-decoration-underline">{{__('View bonds')}}</a>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle rounded fs-3">
                                            <i class="bx bx-bar-chart-alt text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <!-- Total Contracts Card -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">{{__('Total Contracts')}}</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-18 fw-semibold ff-secondary mb-4"> {{ $totalContract }} {{__('SAR')}}</h4>
                                        <a href="{{route('user.dashboard.reports.contracts.index')}}" class="text-decoration-underline">{{__('View contracts')}}</a>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle rounded fs-3">
                                            <i class="las la-handshake text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <!-- Total Discounts Card -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">{{__('Total Discounts')}}</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-18 fw-semibold ff-secondary mb-4"> {{ $totalDiscount }} {{__('SAR')}}</h4>
                                        <a href="{{route('user.dashboard.reports.discounts.index')}}" class="text-decoration-underline">{{__('View discounts')}}</a>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle rounded fs-3">
                                            <i class="bx bxs-discount text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <!-- Total Indebtedness Card -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">{{__('Total Indebtedness')}}</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-18 fw-semibold ff-secondary mb-4"> {{ $totalIndebtedness }} {{__('SAR')}}</h4>
                                        <a href="{{route('user.dashboard.reports.indebtedness.index')}}" class="text-decoration-underline">{{__('View indebtedness')}}</a>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle rounded fs-3">
                                            <i class="bx bx-money text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div> <!-- end row-->
            </div> <!-- end .h-100-->

        </div> <!-- end col -->

    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{__('Recent Transactions')}}</h4>
                    <div class="flex-shrink-0">
                        <a href="{{route('user.dashboard.reports.transactions.index')}}" class="btn btn-soft-info">
                            <i class="ri-eye-line align-middle"></i> {{__('View All')}}
                        </a>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-nowrap table-striped-columns align-middle mb-0">
                            <thead class="text-muted table-light">
                                <tr>
                                    <th scope="col">{{__('Transaction ID')}}</th>
                                    <th scope="col">{{__('Amount')}}</th>
                                    <th scope="col">{{__('Date')}}</th>
                                    <th scope="col">{{__('Type')}}</th>
                                    <th scope="col">{{__('Transaction Entity')}}</th>
                                    <th scope="col">{{__('Status')}}</th>
                                    <th scope="col">{{__('Actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentTransactions as $transaction)
                                <form id="form{{ $transaction->id }}" action="{{ route('user.dashboard.reports.transactions.destroy', $transaction->id) }}" method="post" class="hidden">
                                    @csrf
                                    @method('delete')
                                </form>
                                <tr>
                                    <td>
                                        <a href="#" class="fw-medium link-primary">{{ $transaction->id }}</a>
                                    </td>
                                    <td>
                                        <span class="text-primary">{{$transaction->amount}} {{__('SAR')}}</span>
                                    </td>
                                    <td>{{$transaction->date}}</td>
                                    <td>
                                        {{$transaction->transactionType->name}}
                                    <td>
                                        <x-dashboard.reports.transactions.transaction-link :transaction="$transaction" />
                                    </td>
                                    <td>
                                        <x-dashboard.table-status-badge :statusId="$transaction->status_id" />
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <a href="{{ route('user.dashboard.reports.transactions.edit', $transaction->id) }}" class="btn btn-icon btn-primary edit-item-btn" title="{{__('Edit')}}"><i class="bx bx-edit"></i></a>
                                            </div>
                                            <div class="show">
                                                <a href="{{ route('user.dashboard.reports.transactions.show', $transaction->id) }}" class="btn btn-icon btn-info edit-item-btn" title="{{__('Show')}}"><i class="ri-eye-line"></i></a>
                                            </div>
                                            <div class="remove">
                                                <button class="btn btn-icon btn-danger remove-item-btn" title="{{__('Delete')}}" data-id="{{ $transaction->id }}"><i class="bx bx-trash"></i></button>
                                            </div>
                                        </div>
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
</div>
@endsection
@section("scripts")
<script src="{{ asset('dashboard/assets/libs/prismjs/prism.js') }}"></script>
<!-- Sweet Alerts js -->
<script src="{{ asset('dashboard/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{asset('dashboard/assets/js/actions/delete-items.js')}}"></script>
@endsection