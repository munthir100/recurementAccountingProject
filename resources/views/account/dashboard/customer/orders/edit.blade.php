@extends('account.dashboard.layouts.shared.app-layout')

@section('title')
@include("account.dashboard.layouts.shared.includes.title-meta", ["title" => __("Edit Order")])
@endsection

@section('page-title')
@include("account.dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Account"), "title" => __("Edit Order")])
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
                <form action="{{ route('account.dashboard.customer.orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 col-sm-12 mb-3 text-start">
                            <label for="worker_id" class="form-label">{{ __('Worker') }}</label>
                            <select name="worker_id" id="worker_id" class="form-select">
                                <option value="">{{ __('Select Worker') }}</option>
                                @foreach (\App\Models\Worker::all() as $worker)
                                <option value="{{ $worker->id }}" {{ (old('worker_id') ?? $order->worker_id) == $worker->id ? 'selected' : '' }}>{{ $worker->first_name }} {{ $worker->last_name }}</option>
                                @endforeach
                            </select>
                            @error('worker_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-20px">
                            <label for="amount" class="form-label">{{ __('Amount') }}</label>
                            <input type="number" step="0.01" class="input-small form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount', $order->amount) }}" min="0">
                            @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-20px">
                            <label for="contract_type" class="form-label">{{ __('Contract Type') }}</label>
                            <input type="text" class="input-small form-control @error('contract_type') is-invalid @enderror" id="contract_type" name="contract_type" value="{{ old('contract_type', $order->contract_type) }}" maxlength="255">
                            @error('contract_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-20px">
                            <label for="contract_start_duration" class="form-label">{{ __('Contract Start Date') }}</label>
                            <input type="date" class="input-small form-control @error('contract_start_duration') is-invalid @enderror" id="contract_start_duration" name="contract_start_duration" value="{{ old('contract_start_duration', $order->contract_start_duration) }}">
                            @error('contract_start_duration')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-20px">
                            <label for="contract_end_duration" class="form-label">{{ __('Contract End Date') }}</label>
                            <input type="date" class="input-small form-control @error('contract_end_duration') is-invalid @enderror" id="contract_end_duration" name="contract_end_duration" value="{{ old('contract_end_duration', $order->contract_end_duration) }}">
                            @error('contract_end_duration')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        <div class="col-md-6 mb-20px">
                            <label class="mb-10px" for="country_id">{{ __('Country') }} <span class="text-red">*</span></label>
                            <select name="delivery_address[country_id]" id="country_id" class="input-small form-select" required>
                                <option value="">{{ __('Select Country') }}</option>
                                @foreach(App\Models\Country::all() as $country)
                                <option value="{{ $country->id }}" {{ (old('delivery_address.country_id') ?? $order->deliveryAddress->country_id) == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @error('delivery_address.country_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-20px">
                            <label class="mb-10px" for="city">{{ __('City') }} <span class="text-red">*</span></label>
                            <input type="text" class="input-small form-control @error('delivery_address.city') is-invalid @enderror" id="city" name="delivery_address[city]" value="{{ old('delivery_address.city', $order->deliveryAddress->city) }}" maxlength="255">
                            @error('delivery_address.city')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-20px">
                            <label class="mb-10px" for="address">{{ __('Address') }} <span class="text-red">*</span></label>
                            <input type="text" class="input-small form-control @error('delivery_address.address') is-invalid @enderror" id="address" name="delivery_address[address]" value="{{ old('delivery_address.address', $order->deliveryAddress->address) }}" maxlength="255">
                            @error('delivery_address.address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 mb-20px">
                            <label for="additional_information" class="form-label">{{ __('Additional Information (Optional)') }}</label>
                            <textarea class="input-small form-control @error('additional_information') is-invalid @enderror" id="additional_information" name="additional_information" maxlength="1000">{{ old('additional_information', $order->additional_information) }}</textarea>
                            @error('additional_information')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Map and hidden inputs for lat/lng -->
                        <div class="col-12 mb-20px mt-4">
                            <div id="map" style="height: 300px; width: 100%;"></div>
                            @error('delivery_address.longitude')
                            <div class="invalid-feedback">{{ __('You must drag the map') }}</div>
                            @enderror
                            <input type="hidden" id="latitude" name="delivery_address[latitude]" value="{{ old('delivery_address.latitude', $order->deliveryAddress->latitude) }}">
                            <input type="hidden" id="longitude" name="delivery_address[longitude]" value="{{ old('delivery_address.longitude', $order->deliveryAddress->longitude) }}">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary mt-4">
                            <span>
                                <span class="btn-text">{{ __('Update') }}</span>
                            </span>
                        </button>
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
        var latitude = "{{ old('delivery_address.latitude', $order->deliveryAddress->latitude) }}";
        var longitude = "{{ old('delivery_address.longitude', $order->deliveryAddress->longitude) }}";
        var map = L.map('map').setView([latitude, longitude], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var marker = L.marker([latitude, longitude], {
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

@section("scripts")
<script src="{{ asset('dashboard/assets/libs/prismjs/prism.js') }}"></script>
<!-- Sweet Alerts js -->
<script src="{{ asset('dashboard/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{asset('dashboard/assets/js/actions/delete-items.js')}}"></script>
@endsection
