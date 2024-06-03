@extends('main-site.layouts.shared.app-layout')
@section('title')
@include("main-site.layouts.shared.includes.title-meta", ["title" => __("Home")])
@endsection

@section('content')
<header class="header-with-topbar">
    @include('main-site.layouts.shared.includes.header')
</header>
<!-- start page title -->
<x-main-site.page-header title="{{$worker->first_name}} {{$worker->last_name}}" />

<section>
    <x-dashboard.alerts />
    <div class="container">
        <div class="row align-items-start">
            <div class="col-lg-12 pe-50px md-pe-15px md-mb-50px xs-mb-35px">
                <form action="{{ route('account.customer.orders.store') }}" method="POST">
                    @csrf
                    <input hidden name="worker_id" value="{{ $worker->id }}" required>
                    <div class="row">
                        <div class="col-md-6 mb-20px">
                            <label for="amount" class="form-label">{{__('Amount')}}</label>
                            <input type="number" step="0.01" class="input-small form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount') }}" min="0">
                            @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-20px">
                            <label for="contract_type" class="form-label">{{__('Contract Type')}}</label>
                            <input type="text" class="input-small form-control @error('contract_type') is-invalid @enderror" id="contract_type" name="contract_type" value="{{ old('contract_type') }}" maxlength="255">
                            @error('contract_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-20px">
                            <label for="contract_start_duration" class="form-label">{{__('Contract Start Date')}}</label>
                            <input type="date" class="input-small form-control @error('contract_start_duration') is-invalid @enderror" id="contract_start_duration" name="contract_start_duration" value="{{ old('contract_start_duration') }}">
                            @error('contract_start_duration')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-20px">
                            <label for="contract_end_duration" class="form-label">{{__('Contract End Date')}}</label>
                            <input type="date" class="input-small form-control @error('contract_end_duration') is-invalid @enderror" id="contract_end_duration" name="contract_end_duration" value="{{ old('contract_end_duration') }}">
                            @error('contract_end_duration')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 mb-20px">
                            <label for="additional_information" class="form-label">{{__('Additional Information (Optional)')}}</label>
                            <textarea class="input-small form-control @error('additional_information') is-invalid @enderror" id="additional_information" name="additional_information" maxlength="1000">{{ old('additional_information') }}</textarea>
                            @error('additional_information')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-20px">
                            <label class="mb-10px" for="country_id">{{__('Country')}} <span class="text-red">*</span></label>
                            <select name="delivery_address[country_id]" id="country_id" value="{{ old('delivery_address.country_id') }}" class="input-small form-select" required>
                                <option value="">{{__('Select Country')}}</option>
                                @foreach(App\Models\Country::all() as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                            @error('delivery_address.country_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-20px">
                            <label class="mb-10px" for="city">{{__('City')}} <span class="text-red">*</span></label>
                            <input type="text" class="input-small form-control @error('delivery_address.city') is-invalid @enderror" id="city" name="delivery_address[city]" value="{{ old('delivery_address.city') }}" maxlength="255">
                            @error('delivery_address.city')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 mb-20px">
                            <label class="mb-10px" for="address">{{__('Address')}} <span class="text-red">*</span></label>
                            <input type="text" class="input-small form-control @error('delivery_address.address') is-invalid @enderror" id="address" name="delivery_address[address]" value="{{ old('delivery_address.address') }}" maxlength="255">
                            @error('delivery_address.address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Map and hidden inputs for lat/lng -->
                        <div class="col-12 mb-20px">
                            <div id="map" style="height: 300px; width: 100%;"></div>
                            @error('delivery_address.longitude')
                            <div class="invalid-feedback">
                                you must drag the map
                            </div>
                            @enderror
                            <input type="hidden" id="latitude" name="delivery_address[latitude]" value="">
                            <input type="hidden" id="longitude" name="delivery_address[longitude]" value="">
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 mb-20px text-center">
                            <button type="submit" class="btn-rounded btn-base-color btn btn-large btn-transparent-dark-gray d-table d-lg-inline-block lg-mb-15px md-mx-auto">
                                <span class="btn-text">{{__('Request Now')}}</span>
                                <span class="btn-icon"><i class="feather icon-feather-shopping-bag"></i></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- end page title -->
<script src="{{ asset('dashboard/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{asset('dashboard/assets/js/actions/delete-items.js')}}"></script>
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
@endsection

@section('scripts')
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var map = L.map('map').setView([51.505, -0.09], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var marker = L.marker([51.505, -0.09], {
            draggable: true
        }).addTo(map);

        function updateLatLngInput(lat, lng) {
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
        }

        // Update hidden inputs when marker is dragged
        marker.on('dragend', function(e) {
            var latLng = e.target.getLatLng();
            updateLatLngInput(latLng.lat, latLng.lng);
        });
    });
</script>
@endsection