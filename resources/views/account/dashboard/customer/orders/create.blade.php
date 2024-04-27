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
            <div class="card-body">
                <form action="{{ route('account.dashboard.customer.orders.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-12 mb-3 text-start">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" step="0.01" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount') }}" required min="0">
                            @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-sm-12 mb-3 text-start">
                            <label for="contract_type" class="form-label">Contract Type</label>
                            <input type="text" class="form-control @error('contract_type') is-invalid @enderror" id="contract_type" name="contract_type" value="{{ old('contract_type') }}" required maxlength="255">
                            @error('contract_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12 mb-3 text-start">
                            <label for="contract_start_duration" class="form-label">Contract Start Date</label>
                            <input type="date" class="form-control @error('contract_start_duration') is-invalid @enderror" id="contract_start_duration" name="contract_start_duration" value="{{ old('contract_start_duration') }}" required>
                            @error('contract_start_duration')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-sm-12 mb-3 text-start">
                            <label for="contract_end_duration" class="form-label">Contract End Date</label>
                            <input type="date" class="form-control @error('contract_end_duration') is-invalid @enderror" id="contract_end_duration" name="contract_end_duration" value="{{ old('contract_end_duration') }}" required>
                            @error('contract_end_duration')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12 mb-3 text-start">
                            <label for="worker_id" class="form-label">Worker</label>
                            <select name="worker_id" id="worker_id" class="form-select">
                                <option value="">Select Worker</option>
                                @foreach ($workers as $worker)
                                <option value="{{ $worker->id }}">{{ $worker->first_name }} {{ $worker->last_name }}</option>
                                @endforeach
                            </select>
                            @error('worker_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-sm-12 mb-3 text-start">
                            <label for="additional_information" class="form-label">Additional Information (Optional)</label>
                            <textarea class="form-control @error('additional_information') is-invalid @enderror" id="additional_information" name="additional_information" maxlength="1000">{{ old('additional_information') }}</textarea>
                            @error('additional_information')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <span>
                            <span class="btn-text">{{__('Create')}}</span>
                        </span>
                    </button>
                </form>
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