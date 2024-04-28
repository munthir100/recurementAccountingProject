@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Create Indebtedness")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Indebtednesses"), "title" => __("Create Indebtedness")])
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
                <form action="{{ route('user.dashboard.reports.indebtedness.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="title" class="form-label">{{ __("Title") }}</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="{{ __("Enter title") }}">
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __("Description") }}</label>
                                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}" placeholder="{{ __("Enter description") }}">
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
                                <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount') }}" placeholder="{{ __("Enter amount") }}">
                                @error('amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="due_date" class="form-label">{{ __("Due Date") }}</label>
                                <input type="date" class="form-control @error('due_date') is-invalid @enderror" id="due_date" name="due_date" value="{{ old('due_date') }}">
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
                                <select name="type" id="type" class="form-select">
                                    <option value="">{{__('select type')}}</option>
                                    <option value="Creditor">{{ __("Creditor") }}</option>
                                    <option value="Debtor">{{ __("Debtor") }}</option>
                                </select>
                                @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="status_id" class="form-label">{{ __("Status") }}</label>
                                <select class="form-select @error('status_id') is-invalid @enderror" id="status_id" name="status_id">
                                    <option value="">{{__('Select Status')}}</option>
                                    @foreach (\App\Models\Indebtedness::STATUSES as $statusId => $statusName)
                                    <option value="{{ $statusId }}">{{ __($statusName) }}</option>
                                    @endforeach
                                </select>
                                @error('status_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="account_id" class="form-label">{{ __("Account") }}</label>
                                <select required class="form-select" id="account_id" name="account_id">
                                    <option value="">{{__('Select Account')}}</option>
                                    @foreach(\App\Models\Account::all() as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }}</option>
                                    @endforeach
                                </select>
                                @error('account_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="collateral" class="form-label">{{ __("Collateral") }}</label>
                                <input type="text" class="form-control @error('collateral') is-invalid @enderror" id="collateral" name="collateral" value="{{ old('collateral') }}" placeholder="{{ __("Enter collateral") }}">
                                @error('collateral')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __("Submit") }}</button>
                </form>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection