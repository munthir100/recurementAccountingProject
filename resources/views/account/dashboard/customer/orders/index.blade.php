@extends('account.dashboard.layouts.shared.app-layout')

@section('title')
@include("account.dashboard.layouts.shared.includes.title-meta", ["title" => __("orders")])
@endsection

@section('page-title')
@include("account.dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Account"), "title" => __("Projects")])
@endsection

@section('content')
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
                            <a href="{{route('account.dashboard.customer.orders.create')}}" class="btn btn-success add-btn" id="create-btn">
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
                                <th>{{ __("ID") }}</th>
                                <th>{{ __("Worker") }}</th>
                                <th>{{ __("Contract Type") }}</th>
                                <th>{{ __("Contract Start Duration") }}</th>
                                <th>{{ __("Contract End Duration") }}</th>
                                <th>{{ __("Amount") }}</th>
                                <th>{{ __("Status") }}</th>
                                <th>{{ __("Actions") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                            <form id="form{{ $order->id }}" action="{{ route('account.dashboard.customer.orders.cancel', $order->id) }}" method="post" class="hidden">
                                @csrf
                                @method('put')
                            </form>
                            <tr>
                                <td><a href="#" class="fw-semibold">{{ $order->id }}</a></td>
                                <td>{{ $order->worker->first_name }} {{ $order->worker->last_name }}</td>
                                <td>{{ $order->contract_type }}</td>
                                <td>{{ $order->contract_start_duration }}</td>
                                <td>{{ $order->contract_end_duration }}</td>
                                <td>{{ $order->amount }} {{__('SAR')}} </td>
                                <td> <x-dashboard.table-status-badge statusId="{{ $order->status_id }}" /> </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <div class="edit">
                                            <a href="{{ route('account.dashboard.customer.orders.edit', $order->id) }}" class="btn btn-icon btn-primary edit-item-btn" title="{{__('Edit')}}"><i class="bx bx-edit"></i></a>
                                        </div>
                                        <div class="show">
                                            <a href="{{ route('account.dashboard.customer.orders.show', $order->id) }}" class="btn btn-icon btn-info edit-item-btn" title="{{__('Show')}}"><i class=" ri-eye-line"></i></a>
                                        </div>
                                        <div class="remove">
                                            @if($order->status_id == \App\Models\Status::CANCELLED)
                                            <button class="btn btn-icon btn-danger" title="{{__('Cancel')}}" disabled>
                                                <i class="mdi mdi-cancel"></i>
                                            </button>
                                            @else
                                            <button data-bs-toggle="modal" data-bs-target="#deleteModal{{ $order->id }}" class="btn btn-icon btn-danger" title="{{__('Cancel')}}" data-id="{{ $order->id }}">
                                                <i class="mdi mdi-cancel"></i>
                                            </button>
                                            @endif
                                        </div>

                                    </div>
                                </td>
                            </tr>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $order->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $order->id }}">
                                                {{ __("Confirm Cancelling Of Ordering Worker") }}
                                                <a href="{{route('home.workers.show', $order->worker->id)}}" target="__blank">
                                                    {{$order->worker->first_name}}
                                                </a>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body d-flex justify-content-center align-items-center">
                                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:120px;height:120px"></lord-icon>
                                            <div class="mt-4 pt-2 fs-15 mx-5">
                                                <h4>{{ __("Are you Sure ?") }}</h4>
                                                <p class="text-muted mx-4 mb-0">{{ __("Are you Sure You want to Cancel this order?") }}</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __("Cancel") }}</button>
                                            <button type="button" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('form{{ $order->id }}').submit();">{{ __("Cancel Order") }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- End Delete Modal -->
                            @empty
                        </tbody>

                        <tr>
                            <th colspan="4" class="text-center">{{ __("No items found!") }}</th>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        <x-dashboard.pagination :model="$orders" />
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