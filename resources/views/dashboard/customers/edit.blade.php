@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Projects")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Account"), "title" => __("Projects")])
@endsection

@section('content')
<x-dashboard.alerts />
<div class="row">
    <div class="col-md-6">

        <div class="card">
            <div class="card-body">
                <form action="{{ route('user.dashboard.customers.update', $customer->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">{{ __('Name') }}:</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $customer->account->name) }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('Email') }}:</label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $customer->account->email) }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">{{ __('Update') }}</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <x-dashboard.bank-account-form :account="$customer->account" />
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="container">
                <h1>{{ __('Update Password') }}</h1>
                <form action="{{ route('user.dashboard.customers.update', $customer->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input required type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">{{ __('Update Password') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection