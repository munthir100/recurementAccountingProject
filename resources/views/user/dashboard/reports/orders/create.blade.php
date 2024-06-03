@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Create Order")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Orders"), "title" => __("Create Order")])
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

                <form action="{{ route('user.dashboard.reports.orders.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="mb-3">
                                <label for="account_id" class="form-label">{{ __("Account") }}</label>
                                <select required class="form-select" id="account_id" name="account_id">
                                    <option value="">{{__('Select Account')}}</option>
                                    @foreach(\App\Models\Account::all() as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }}</option>
                                    @endforeach
                                </select>
                                @error('account_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <label for="worker_id" class="form-label">{{ __("Worker") }}</label>
                            <div class="mb-3">
                                <select required class="form-select" id="worker_id" name="worker_id">
                                    <option value="">Select Worker</option>
                                    @foreach(\App\Models\Worker::all() as $worker)
                                    <option value="{{ $worker->id }}">{{ $worker->first_name }} {{ $worker->last_name }}</option>
                                    @endforeach
                                </select>
                                @error('worker_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
    
                        <div class="col-md-4 col-sm-12">
                            <div class="mb-3">
                                <label for="status_id" class="form-label">{{ __("Status") }}</label>
                                <select required class="form-select" id="status_id" name="status_id">
                                    <option value="">{{__('Select Status')}}</option>
                                    @foreach(\App\Models\Order::STATUSES as $id => $name)
                                    <option value="{{ $id }}">{{ __($name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

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
                        <div class="col-12 mb-20px mt-4">
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
                        <div class="col-12 mb-20px text-center mt-2">
                            <button type="submit" class="btn btn-primary">
                                <span class="btn-text">{{__('Save')}}</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>
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