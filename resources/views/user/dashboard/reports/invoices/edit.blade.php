@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Edit Invoice")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Invoices"), "title" => __("Edit Invoice")])
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
                <form action="{{ route('user.dashboard.reports.invoices.update', $invoice->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="title" class="form-label">{{ __("Title") }}</label>
                                <input required type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $invoice->title) }}" placeholder="{{ __("Enter title") }}">
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __("Description") }}</label>
                                <input required type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description', $invoice->description) }}" placeholder="{{ __("Enter description") }}">
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="amount" class="form-label">{{ __("Amount") }}</label>
                                <input required type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount', $invoice->amount) }}" placeholder="{{ __("Enter amount") }}">
                                @error('amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="due_date" class="form-label">{{ __("Due Date") }}</label>
                                <input required type="date" class="form-control @error('due_date') is-invalid @enderror" id="due_date" name="due_date" value="{{ old('due_date', $invoice->due_date) }}">
                                @error('due_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="type" class="form-label">{{ __("Type") }}</label>
                                <input required type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{ old('type', $invoice->type) }}" placeholder="{{ __("Enter type") }}">
                                @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="status_id" class="form-label">{{ __("Status") }}</label>
                                <select required class="form-select" id="status_id" name="status_id">
                                    <option value="">{{__('Select Status')}}</option>
                                    @foreach(\App\Models\Invoice::STATUSES as $id => $name)
                                    <option value="{{ $id }}" {{ old('status_id', $invoice->status_id) == $id ? 'selected' : '' }}>{{ __($name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="account_id" class="form-label">{{ __("Account") }}</label>
                                <select required class="form-select" id="account_id" name="account_id">
                                    <option value="">Select Account</option>
                                    @foreach(\App\Models\Account::all() as $account)
                                    <option value="{{ $account->id }}" {{ old('account_id', $invoice->account_id) == $account->id ? 'selected' : '' }}>{{ $account->name }}</option>
                                    @endforeach
                                </select>
                                @error('account_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="worker_id" class="form-label">{{ __("Worker") }}</label>
                                <div class="mb-3">
                                    <select required class="form-select" id="worker_id" name="worker_id">
                                        <option value="">Select Worker</option>
                                        @foreach(\App\Models\Worker::all() as $worker)
                                        <option value="{{ $worker->id }}" {{ old('worker_id', $invoice->worker_id) == $worker->id ? 'selected' : '' }}>{{ $worker->first_name }} {{ $worker->last_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('worker_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="mb-3">
                            <label for="billing_address" class="form-label">{{ __("Billing Address") }}</label>
                            <textarea required class="form-control @error('billing_address') is-invalid @enderror" id="billing_address" name="billing_address" placeholder="{{ __("Enter billing address") }}">{{ old('billing_address', $invoice->billing_address) }}</textarea>
                            @error('billing_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __("Save") }}</button>
                </form>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection
