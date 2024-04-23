@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Invoices")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Invoices"), "title" => __("Invoices")])
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="h-100">
            <div class="row">
                @foreach(\App\Models\Invoice::STATUSES as $status => $statusLabel)
                <!-- Total {{ $statusLabel }} invoices Card -->
                <div class="col-xl-3 col-md-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">{{__($statusLabel)}}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    @php
                                    $statusLabelLowerCase = strtolower($statusLabel);
                                    $value = $$statusLabelLowerCase ?? null;
                                    @endphp

                                    <h4 class="fs-18 fw-semibold ff-secondary mb-4">{{ __('SAR') }} {{ $value }}</h4>

                                    <a href="{{ route('user.dashboard.reports.invoices.index', ['status_id' => $status]) }}" class="text-decoration-underline">{{__('View')}}</a>
                                </div>

                                @php
                                $class = trim(view('status-class', ['statusId' => $status])->render());
                                @endphp
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-{{$class}}-subtle rounded fs-3">
                                        <i class="bx bx-dollar-circle text-{{$class}}"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
                @endforeach
            </div> <!-- end row-->
        </div> <!-- end .h-100-->
    </div> <!-- end col -->
</div>
<div class="row">
    <div class="col-lg-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="mb-2"></div>
                <div class="row g-4 mb-3">
                    <div class="col-sm-auto">
                        <div>
                            <a href="{{ route('user.dashboard.reports.invoices.create') }}" class="btn btn-success add-btn" id="create-btn">
                                <i class="ri-add-line align-bottom me-1"></i> {{ __("Add") }}
                            </a>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="d-flex justify-content-sm-end">
                            <div class="search-box ms-2">
                                <form action="" method="get">
                                    <div class="form-floating">
                                        <input type="text" name="search" class="form-control search" id="search" placeholder="{{ __("Search...") }}">
                                        <label for="search">{{ __("Type a Keyword...") }}</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-nowrap table-striped-columns mb-3">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">{{ __("ID") }}</th>
                                <th scope="col">{{ __("Amount") }}</th>
                                <th scope="col">{{ __("Type") }}</th>
                                <th scope="col">{{ __("Status") }}</th>
                                <th scope="col">{{ __("Actions") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($invoices as $invoice)
                            <form id="form{{ $invoice->id }}" action="{{ route('user.dashboard.reports.invoices.destroy', $invoice->id) }}" method="post" class="hidden">
                                @csrf
                                @method('delete')
                            </form>
                            <tr>
                                <td>{{ $invoice->id }}</td>
                                <td>{{ $invoice->amount }} {{__('SAR')}} </td>
                                <td>{{ $invoice->type }}</td>
                                <td> <x-dashboard.table-status-badge statusId="{{ $invoice->status_id }}" /> </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <div class="edit">
                                            <a href="{{ route('user.dashboard.reports.invoices.edit', $invoice->id) }}" class="btn btn-icon btn-primary edit-item-btn" title="{{__('Edit')}}"><i class="bx bx-edit"></i></a>
                                        </div>
                                        <div class="show">
                                            <a href="{{ route('user.dashboard.reports.invoices.show', $invoice->id) }}" class="btn btn-icon btn-info edit-item-btn" title="{{__('Show')}}"><i class="ri-eye-line"></i></a>
                                        </div>
                                        <div class="remove">
                                            <button class="btn btn-icon btn-danger remove-item-btn" title="{{__('Delete')}}" data-id="{{ $invoice->id }}"><i class="bx bx-trash"></i></button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="5" class="text-center">{{ __("No items found!") }}</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        <x-dashboard.pagination :model="$invoices" />
                    </div>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection

@section("scripts")
<script src="{{ asset('dashboard/assets/libs/prismjs/prism.js') }}"></script>
<!-- Sweet Alerts js -->
<script src="{{ asset('dashboard/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{asset('dashboard/assets/js/actions/delete-items.js')}}"></script>
@endsection