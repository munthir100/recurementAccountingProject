@extends('account.dashboard.layouts.shared.app-layout')

@section('title')
@include("account.dashboard.layouts.shared.includes.title-meta", ["title" => __("Invoices")])
@endsection

@section('page-title')
@include("account.dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Invoices"), "title" => __("Invoices")])
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="h-100">
            <div class="row">
                @foreach(\App\Models\Invoice::STATUSES as $status => $statusLabel)
                <!-- Total {{ $statusLabel }} Invoices Card -->
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

                                    <a href="{{ route('account.dashboard.customer.invoices.index', ['status_id' => $status]) }}" class="text-decoration-underline">{{__('View')}}</a>
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

            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-nowrap table-striped-columns mb-3">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">{{ __("ID") }}</th>
                                <th scope="col">{{ __("Account") }}</th>
                                <th scope="col">{{ __("Due Date") }}</th>
                                <th scope="col">{{ __("Amount") }}</th>
                                <th scope="col">{{ __("Date") }}</th>
                                <th scope="col">{{ __("Status") }}</th>
                                <th scope="col">{{ __("Actions") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->id }}</td>
                                <td>{{ $invoice->account->name }}</td>
                                <td>{{ $invoice->due_date }}</td>
                                <td>{{ $invoice->amount }} {{__('SAR')}} </td>
                                <td>{{ $invoice->created_at->diffForHumans() }}</td>
                                <td> <x-dashboard.table-status-badge statusId="{{ $invoice->status_id }}" /> </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <div class="show">
                                            <a href="{{ route('account.dashboard.customer.invoices.show', $invoice->id) }}" class="btn btn-icon btn-info edit-item-btn" title="{{__('Show')}}"><i class="ri-eye-line"></i></a>
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