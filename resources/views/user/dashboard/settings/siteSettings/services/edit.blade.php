@extends('dashboard.layouts.shared.app-layout')

@section('title')
    @include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Edit Service")])
@endsection

@section('page-title')
    @include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Account"), "title" => __("Edit Service")])
@endsection

@section('content')
    <div class="row">
        <x-dashboard.alerts />
        <div class="card">
            <div class="card-body">
                <form action="{{ route('user.dashboard.settings.siteSettings.services.update', $service->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title-en">{{ __('Title (English)') }}</label>
                                <input type="text" class="form-control" id="title-en" name="title[en]" value="{{ $service->gettranslations('title')['en'] }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title-ar">{{ __('Title (Arabic)') }}</label>
                                <input type="text" class="form-control" id="title-ar" name="title[ar]" value="{{ $service->gettranslations('title')['ar'] }}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description-en">{{ __('Description (English)') }}</label>
                                <textarea class="form-control" id="description-en" name="description[en]">{{ $service->gettranslations('description')['en'] }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description-ar">{{ __('Description (Arabic)') }}</label>
                                <textarea class="form-control" id="description-ar" name="description[ar]">{{ $service->gettranslations('description')['ar'] }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">{{ __('Image') }}</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status_id" class="form-label">{{ __("Status") }}</label>
                                <select class="form-select @error('status_id') is-invalid @enderror" id="status_id" name="status_id">
                                    <option value="">{{__('Select Status')}}</option>
                                    @foreach (\App\Models\Service::STATUSES as $statusId => $statusName)
                                        <option value="{{ $statusId }}" {{ $service->status_id == $statusId ? 'selected' : '' }}>{{ __($statusName) }}</option>
                                    @endforeach
                                </select>
                                @error('status_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- Hidden input to ensure a value is always sent -->
                    <input type="hidden" name="is_new" value="0">
                    
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="is_new" name="is_new" value="1" {{ $service->is_new ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_new">{{ __('Is New') }}</label>
                    </div>
                    
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection