@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Create Banner")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Settings"), "title" => __("Create Banner"),"link" => route('user.dashboard.settings.siteSettings.index')])
@endsection

@section('content')
<x-dashboard.alerts />
<div class="row">
    <form method="POST" action="{{ route('user.dashboard.settings.siteSettings.update.banner') }}" enctype="multipart/form-data">
        @foreach ($siteSettings->settings['banners'] as $index => $banner)
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title-en-{{ $index }}">{{ __('Title (English)') }}</label>
                                <input type="text" class="form-control" id="title-en-{{ $index }}" name="banners[{{ $index }}][en][title]" value="{{ $banner['en']['title'] }}">
                            </div>
                            <div class="form-group">
                                <label for="details-en-{{ $index }}">{{ __('Details (English)') }}</label>
                                <textarea class="form-control" id="details-en-{{ $index }}" name="banners[{{ $index }}][en][details]">{{ $banner['en']['details'] }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title-ar-{{ $index }}">{{ __('Title (Arabic)') }}</label>
                                <input type="text" class="form-control" id="title-ar-{{ $index }}" name="banners[{{ $index }}][ar][title]" value="{{ $banner['ar']['title'] }}">
                            </div>
                            <div class="form-group">
                                <label for="details-ar-{{ $index }}">{{ __('Details (Arabic)') }}</label>
                                <textarea class="form-control" id="details-ar-{{ $index }}" name="banners[{{ $index }}][ar][details]">{{ $banner['ar']['details'] }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image-{{ $index }}">{{ __('Image') }}</label>
                        <input type="file" class="form-control" id="image-{{ $index }}" name="banners[{{ $index }}][image]">
                        <img src="{{ $banner['image'] }}" alt="Banner Image" class="img-thumbnail mt-2" width="100">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="text-center">
            
            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
        </div>
    </form>
</div>
@endsection