@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Edit Country")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Account"), "title" => __("Edit Country")])
@endsection

@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="container">
                <h1>{{ __('Edit Country') }}</h1>
                <form action="{{ route('user.dashboard.settings.countries.update', $country->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Name field -->
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}:</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $country->name) }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Status field -->
                    <div class="form-group mt-3">
                        <label for="status_id">{{ __('Status') }}:</label>
                        <select id="status_id" name="status_id" class="form-control @error('status_id') is-invalid @enderror">
                            <option value="" disabled>{{ __('Select status') }}</option>
                            <option value="{{ App\Models\Status::PUBLISHED }}" @if(old('status_id', $country->status_id) == App\Models\Status::PUBLISHED) selected @endif>
                                {{ __('Published') }}
                            </option>
                            <option value="{{ App\Models\Status::NOT_PUBLISHED }}" @if(old('status_id', $country->status_id) == App\Models\Status::NOT_PUBLISHED) selected @endif>
                                {{ __('Not Published') }}
                            </option>
                        </select>
                        @error('status_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Image field -->
                    <div class="form-group mt-3">
                        <label for="image">{{ __('Image') }}:</label>
                        <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary mt-4">{{ __('Update Country') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection