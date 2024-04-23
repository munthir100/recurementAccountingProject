@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Edit Transaction")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Transactions"), "title" => __("Edit Transaction")])
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
                <form action="{{ route('user.dashboard.reports.transactions.update', ['transaction' => $transaction->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="transaction_type_id" class="form-label">{{ __("Transaction Type") }}</label>
                                <select required class="form-select @error('transaction_type_id') is-invalid @enderror" id="transaction_type_id" name="transaction_type_id">
                                    <option value="">{{__('Select Transaction Type')}}</option>
                                    @foreach(\App\Models\TransactionType::get() as $transactionType)
                                    <option value="{{$transactionType->id}}" {{ $transaction->transaction_type_id == $transactionType->id ? 'selected' : '' }}>{{__($transactionType->name)}}</option>
                                    @endforeach
                                </select>
                                @error('transaction_type_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="amount" class="form-label">{{ __("Amount") }}</label>
                                <input required type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ $transaction->amount }}" placeholder="{{ __("Enter amount") }}">
                                @error('amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="date" class="form-label">{{ __("Date") }}</label>
                                <input required type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ $transaction->date }}">
                                @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="status_id" class="form-label">{{ __("Status") }}</label>
                                <select required class="form-select" id="status_id" name="status_id">
                                    <option value="">{{__('Select Status')}}</option>
                                    @foreach(\App\Models\Transaction::STATUSES as $id => $name)
                                    <option value="{{ $id }}" {{ $transaction->status_id == $id ? 'selected' : '' }}>{{ __($name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="transactionable_type" class="form-label">{{ __("Transaction Category") }}</label>
                                <select required class="form-select" id="transactionable_type" name="transactionable_type">
                                    @foreach (App\Models\Transaction::TRANSACTIONABLE_MODELS as $modelPath => $modelName)
                                    <option value="{{ $modelPath }}" {{ $transaction->transactionable_type == $modelPath ? 'selected' : '' }}>{{ __($modelName) }}</option>
                                    @endforeach
                                </select>
                                @error('transactionable_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="transactionable_id" class="form-label">{{ __("Transaction Category ID") }}</label>
                                <input required type="number" class="form-control @error('transactionable_id') is-invalid @enderror" id="transactionable_id" name="transactionable_id" value="{{ $transaction->transactionable_id }}" placeholder="{{ __("Enter Transaction Category ID") }}">
                                @error('transactionable_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="mb-3">
                            <label for="description" class="form-label">{{ __("Description") }}</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="{{ __("Enter description") }}">{{ $transaction->description }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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