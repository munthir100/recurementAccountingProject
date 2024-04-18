@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Edit CV")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Account"), "title" => __("Edit CV")])
@endsection

@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.dashboard.cvs.update', $cv->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Office Selection -->
                <div class="form-group">
                    <label for="office_id">{{ __('Office') }}</label>
                    <select name="office_id" id="office_id" class="form-control" required>
                        @foreach ($offices as $office)
                        <option value="{{ $office->id }}" {{ $cv->office_id == $office->id ? 'selected' : '' }}>
                            {{ $office->account->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- File Upload -->
                <div class="form-group">
                    <label for="cv">{{ __('Upload CV File') }}</label>
                    <input type="file" name="cv" id="cv" class="form-control" accept=".pdf,.doc,.docx" />

                    <!-- Display existing file link if available -->
                    @if ($cv->getFirstMediaUrl('cvs'))
                    <div class="mt-2">
                        <a href="{{ $cv->getFirstMediaUrl('cvs') }}" target="_blank">
                            {{ __('View Current CV') }}
                        </a>
                    </div>
                    @endif
                </div>

                <!-- Update button -->
                <button type="submit" class="btn btn-primary mt-4">{{ __('Update CV') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection