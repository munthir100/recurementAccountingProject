@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Create Account")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Create Account"), "title" => __("Create Account")])
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
                <form action="{{ route('user.dashboard.accounts.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __("Name") }}</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __("Email") }}</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
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
                                <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __("Password") }}</label>
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">{{ __("Confirm Password") }}</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status_id" class="form-label">{{ __("Status") }}</label>
                                <select required class="form-select @error('status_id') is-invalid @enderror" id="status_id" name="status_id">
                                    <option value="">{{__('Select Status')}}</option>
                                    @foreach(\App\Models\Account::STATUSES as $id => $name)
                                    <option value="{{ $id }}">{{ __($name) }}</option>
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
                                <select name="account_type_id" id="account_type_id" class="form-select @error('account_type_id') is-invalid @enderror" required>
                                    <option value="">{{ __("Select Account Type") }}</option>
                                    @foreach(\App\Models\AccountType::all() as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error('account_type_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6" id="locationContainer" style="display: none;">
                            <div class="mb-3">
                                <label for="location" class="form-label">{{ __("Location") }}</label>
                                <input type="text" name="location" id="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}">
                                @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">{{ __("Create Account") }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const accountTypeSelect = document.getElementById('account_type_id');
        const locationContainer = document.getElementById('locationContainer');

        // Function to toggle visibility of location input based on account type
        function toggleLocationVisibility() {
            const selectedAccountType = accountTypeSelect.value;
            if (selectedAccountType === '{{ \App\Models\AccountType::OFFICE }}') {
                locationContainer.style.display = 'block';
            } else {
                locationContainer.style.display = 'none';
            }
        }

        // Initial toggle based on current account type
        toggleLocationVisibility();

        // Add event listener to account type select
        accountTypeSelect.addEventListener('change', toggleLocationVisibility);
    });
</script>
@endsection