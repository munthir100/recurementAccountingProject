@extends('account.dashboard.layouts.shared.app-layout')

@section('title')
@include("account.dashboard.layouts.shared.includes.title-meta", ["title" => __("Edit Order")])
@endsection

@section('page-title')
@include("account.dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Orders"), "title" => __("Edit Order")])
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
                <form action="{{ route('account.dashboard.customer.orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <label for="worker_id" class="form-label">{{ __("Worker") }}</label>
                            <div class="mb-3">
                                <select required class="form-select" id="worker_id" name="worker_id">
                                    <option value="">Select Worker</option>
                                    @foreach(\App\Models\Worker::all() as $worker)
                                    <option value="{{ $worker->id }}" {{ $worker->id == $order->worker_id ? 'selected' : '' }}>{{ $worker->first_name }} {{ $worker->last_name }}</option>
                                    @endforeach
                                </select>
                                @error('worker_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="contract_type" class="form-label">{{ __("Contract Type") }}</label>
                                <input required type="text" class="form-control @error('contract_type') is-invalid @enderror" id="contract_type" name="contract_type" value="{{ old('contract_type', $order->contract_type) }}" placeholder="{{ __("Enter Contract Type") }}">
                                @error('contract_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="contract_start_duration" class="form-label">{{ __("Contract Start Duration") }}</label>
                                <input required type="date" class="form-control @error('contract_start_duration') is-invalid @enderror" id="contract_start_duration" name="contract_start_duration" value="{{ old('contract_start_duration', $order->contract_start_duration) }}">
                                @error('contract_start_duration')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="contract_end_duration" class="form-label">{{ __("Contract End Duration") }}</label>
                                <input required type="date" class="form-control @error('contract_end_duration') is-invalid @enderror" id="contract_end_duration" name="contract_end_duration" value="{{ old('contract_end_duration', $order->contract_end_duration) }}">
                                @error('contract_end_duration')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="amount" class="form-label">{{ __("Amount") }}</label>
                                <input required type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount', $order->amount) }}" placeholder="{{ __("Enter amount") }}">
                                @error('amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="additional_information" class="form-label">{{ __("Additional Information") }}</label>
                                <input type="text" class="form-control @error('additional_information') is-invalid @enderror" id="additional_information" name="additional_information" value="{{ old('additional_information', $order->additional_information) }}" placeholder="{{ __("Enter Additional Information") }}">
                                @error('additional_information')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="status_id" class="form-label">{{ __("Status") }}</label>
                                <select required class="form-select" id="status_id" name="status_id">
                                    <option value="">{{__('Select Status')}}</option>
                                    @foreach(\App\Models\Order::STATUSES as $id => $name)
                                    <option value="{{ $id }}" {{ $id == $order->status_id ? 'selected' : '' }}>{{ __($name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Add other fields as needed -->
                    <button type="submit" class="btn btn-primary">{{ __("Submit") }}</button>
                </form>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection
