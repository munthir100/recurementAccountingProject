@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Create Blog Post")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Account"), "title" => __("Create Blog Post")])
@endsection

@section('content')
<div class="row">
    <div class="card">
        @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card-body">
            <form action="{{ route('user.dashboard.settings.siteSettings.update') }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="en_text" class="form-label">English Text:</label>
                        <input type="text" class="form-control" id="en_text" name="top_bar[en][text]" value="{{ $siteSettings->settings['top_bar']['en']['text'] }}">
                    </div>
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="ar_text" class="form-label">Arabic Text:</label>
                        <input type="text" class="form-control" id="ar_text" name="top_bar[ar][text]" value="{{ $siteSettings->settings['top_bar']['ar']['text'] }}">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="phone" class="form-label">Phone:</label>
                        <input type="text" class="form-control" id="phone" name="top_bar[en][phone]" value="{{ $siteSettings->settings['top_bar']['en']['phone'] }}">
                    </div>
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="ar_phone" class="form-label">Arabic Phone:</label>
                        <input type="text" class="form-control" id="ar_phone" name="top_bar[ar][phone]" value="{{ $siteSettings->settings['top_bar']['ar']['phone'] }}">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" class="form-control" id="address" name="top_bar[en][address]" value="{{ $siteSettings->settings['top_bar']['en']['address'] }}">
                    </div>
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="ar_address" class="form-label">Arabic Address:</label>
                        <input type="text" class="form-control" id="ar_address" name="top_bar[ar][address]" value="{{ $siteSettings->settings['top_bar']['ar']['address'] }}">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="visibility" class="form-label">Visibility:</label>
                        <select class="form-select" id="visibility" name="top_bar[visibility]">
                            <option value="1" {{ $siteSettings->settings['top_bar']['visibility'] ? 'selected' : '' }}>True</option>
                            <option value="0" {{ !$siteSettings->settings['top_bar']['visibility'] ? 'selected' : '' }}>False</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 col-md-6 col-sm-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection