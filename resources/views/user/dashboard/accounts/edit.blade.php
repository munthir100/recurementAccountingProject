@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Edit Account")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Edit Account"), "title" => __("Edit Account")])
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
                <form action="{{ route('user.dashboard.accounts.update', $account->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __("Name") }}</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $account->name }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __("Email") }}</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $account->email }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label">{{ __("Phone") }}</label>
                                <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $account->phone }}">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status_id" class="form-label">{{ __("Status") }}</label>
                                <select required class="form-select @error('status_id') is-invalid @enderror" id="status_id" name="status_id">
                                    <option value="">{{__('Select Status')}}</option>
                                    @foreach(\App\Models\Account::STATUSES as $id => $name)
                                    <option value="{{ $id }}" @if($account->status_id == $id) selected @endif>{{ __($name) }}</option>
                                    @endforeach
                                </select>
                                @error('status_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="account_type_id" class="form-label">{{ __("Account Type") }}</label>
                                <select readonly disabled name="account_type_id" id="account_type_id" class="form-select @error('account_type_id') is-invalid @enderror">
                                    <option value="">{{ __("Select Account Type") }}</option>
                                    @foreach(\App\Models\AccountType::all() as $type)
                                    <option value="{{ $type->id }}" @if($account->account_type_id == $type->id) selected @endif>{{ __($type->name) }}</option>
                                    @endforeach
                                </select>
                                @error('account_type_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @if($account->isOfficeAccount)
                        <div class="col-md-6" id="locationContainer" style="display: {{ $account->account_type_id === \App\Models\AccountType::OFFICE ? 'block' : 'none' }}">
                            <div class="mb-3">
                                <label for="location" class="form-label">{{ __("Location") }}</label>
                                <input type="text" name="location" value="@if($account->isOfficeAccount) {{$account->office->location}} @endif" id="location" class="form-control @error('location') is-invalid @enderror" value="{{ $account->location }}">
                                @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">{{ __('Update') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
