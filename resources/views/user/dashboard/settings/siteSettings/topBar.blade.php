@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Create Blog Post")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Settings"), "title" => __("Create Blog Post"),"link" => route('user.dashboard.settings.siteSettings.index')])
@endsection

@section('content')
<div class="row">
    <div class="card">
        <x-dashboard.alerts />
        <div class="card-body">
            <form action="{{ route('user.dashboard.settings.siteSettings.update.topBar') }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="en_text" class="form-label">{{ __('English Text:') }}</label>
                        <input type="text" class="form-control" id="en_text" name="top_bar[en][text]" value="{{ $siteSettings->settings['top_bar']['en']['text'] }}">
                    </div>
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="ar_text" class="form-label">{{ __('Arabic Text:') }}</label>
                        <input type="text" class="form-control" id="ar_text" name="top_bar[ar][text]" value="{{ $siteSettings->settings['top_bar']['ar']['text'] }}">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="phone" class="form-label">{{ __('Phone:') }}</label>
                        <input type="text" class="form-control" id="phone" name="top_bar[en][phone]" value="{{ $siteSettings->settings['top_bar']['en']['phone'] }}">
                    </div>
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="ar_phone" class="form-label">{{ __('Arabic Phone:') }}</label>
                        <input type="text" class="form-control" id="ar_phone" name="top_bar[ar][phone]" value="{{ $siteSettings->settings['top_bar']['ar']['phone'] }}">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="address" class="form-label">{{ __('Address:') }}</label>
                        <input type="text" class="form-control" id="address" name="top_bar[en][address]" value="{{ $siteSettings->settings['top_bar']['en']['address'] }}">
                    </div>
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="ar_address" class="form-label">{{ __('Arabic Address:') }}</label>
                        <input type="text" class="form-control" id="ar_address" name="top_bar[ar][address]" value="{{ $siteSettings->settings['top_bar']['ar']['address'] }}">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="visibility" class="form-label">{{ __('Visibility:') }}</label>
                        <select class="form-select" id="visibility" name="top_bar[visibility]">
                            <option value="1" {{ $siteSettings->settings['top_bar']['visibility'] ? 'selected' : '' }}>{{ __('Active') }}</option>
                            <option value="0" {{ !$siteSettings->settings['top_bar']['visibility'] ? 'selected' : '' }}>{{ __('Not Active') }}</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 col-md-6 col-sm-12">
                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection