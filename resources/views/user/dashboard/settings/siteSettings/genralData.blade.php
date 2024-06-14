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
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('user.dashboard.settings.siteSettings.genralData.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="name-en">{{ __('Site Name (English)') }}</label>
                                <input type="text" class="form-control" id="name-en" name="name[en]" value="{{ $siteSettings->gettranslations('name')['en'] }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="name-ar">{{ __('Site Name (Arabic)') }}</label>
                                <input type="text" class="form-control" id="name-ar" name="name[ar]" value="{{ $siteSettings->gettranslations('name')['ar'] }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="description-en">{{ __('Site Description (English)') }}</label>
                                <textarea class="form-control" id="description-en" name="description[en]">{{ $siteSettings->gettranslations('description')['en'] }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="description-ar">{{ __('Site Description (Arabic)') }}</label>
                                <textarea class="form-control" id="description-ar" name="description[ar]">{{$siteSettings->gettranslations('description')['ar']}}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="whatsapp_number">{{ __('Whatsapp Number') }}</label>
                                <input class="form-control" id="whatsapp_number" name="whatsapp_number" value="{{$siteSettings->whatsapp_number}}">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="contact_email">{{ __('Contact Email') }}</label>
                                <input class="form-control" id="contact_email" name="contact_email" value="{{$siteSettings->contact_email}}">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="contact_phone">{{ __('Contact Phone') }}</label>
                                <input class="form-control" id="contact_phone" name="contact_phone" value="{{$siteSettings->contact_phone}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="logo">{{ __('Logo') }}</label>
                                <input type="file" class="form-control" id="logo" name="logo">
                                <img src="{{ $siteSettings->hasMedia('logo') ? $siteSettings->getFirstMedia('logo')->getUrl() : '/images/custom/rayak-1.webp' }}" alt="Logo Image" class="img-thumbnail mt-2" width="100">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="icon">{{ __('Icon') }}</label>
                                <input type="file" class="form-control" id="icon" name="icon">
                                <img src="{{ $siteSettings->hasMedia('icon') ? $siteSettings->getFirstMedia('icon')->getUrl() : '/images/custom/rayak-1.webp' }}" alt="Icon Image" class="img-thumbnail mt-2" width="100">
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection