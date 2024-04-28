@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Bonds")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Bonds"), "title" => __("Bonds")])
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="h-100">
            <div class="row">
                @foreach(\App\Models\Bond::STATUSES as $status => $statusLabel)
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
                                    $statusLabelLowerCase = str_replace(' ', '_', strtolower($statusLabel));
                                    $value = $$statusLabelLowerCase ?? null;
                                    @endphp

                                    <h4 class="fs-18 fw-semibold ff-secondary mb-4">{{ $value }} {{ __('SAR') }}</h4>

                                    <a href="{{ route('user.dashboard.reports.bonds.index', ['status_id' => $status]) }}" class="text-decoration-underline">{{__('View')}}</a>
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
            <div class="card-header align-items-center d-flex">
                <div class="mb-0 flex-grow-1">
                    <div class="col-3 custom-table-search">
                        <form action="" method="GET" class="mb-0">
                            <input type="text" name="search" class="form-control search" id="search" placeholder="{{ __("Type a Keyword...") }}">
                        </form>
                    </div>
                </div>
                <div class="flex-shrink-0">
                    <a href="{{route('user.dashboard.reports.bonds.create')}}" class="btn btn-soft-info">
                        <i class="ri-add-circle-line align-middle"></i> {{__('Add')}}
                    </a>
                </div>
            </div><!-- end card header -->


            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-nowrap table-striped-columns mb-3">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">{{ __("ID") }}</th>
                                <th scope="col">{{ __("Amount") }}</th>
                                <th scope="col">{{ __("Interest Rate") }}</th>
                                <th scope="col">{{ __("Maturity Date") }}</th>
                                <th scope="col">{{ __("Status") }}</th>
                                <th scope="col">{{ __("Actions") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bonds as $bond)
                            <form id="form{{ $bond->id }}" action="{{ route('user.dashboard.reports.bonds.destroy', $bond->id) }}" method="post" class="hidden">
                                @csrf
                                @method('delete')
                            </form>
                            <tr>
                                <td>{{ $bond->id }}</td>
                                <td>{{ $bond->amount }} {{__('SAR')}} </td>
                                <td>{{ $bond->interest_rate }} %</td>
                                <td>{{ $bond->maturity_date }}</td>
                                <td> <x-dashboard.table-status-badge statusId="{{ $bond->status_id }}" /> </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <div class="edit">
                                            <a href="{{ route('user.dashboard.reports.bonds.edit', $bond->id) }}" class="btn btn-icon btn-primary edit-item-btn" title="{{__('Edit')}}"><i class="bx bx-edit"></i></a>
                                        </div>
                                        <div class="show">
                                            <a href="{{ route('user.dashboard.reports.bonds.show', $bond->id) }}" class="btn btn-icon btn-info edit-item-btn" title="{{__('Show')}}"><i class="ri-eye-line"></i></a>
                                        </div>
                                        <div class="remove">
                                            <button class="btn btn-icon btn-danger remove-item-btn" title="{{__('Delete')}}" data-id="{{ $bond->id }}"><i class="bx bx-trash"></i></button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="5" class="text-center">{{ __("No items fond!") }}</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        <x-dashboard.pagination :model="$bonds" />
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