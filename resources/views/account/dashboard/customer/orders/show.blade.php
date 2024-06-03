@extends('account.dashboard.layouts.shared.app-layout')

@section('title')
@include("account.dashboard.layouts.shared.includes.title-meta", ["title" => __("Orders")])
@endsection

@section('page-title')
@include("account.dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Account"), "title" => __("Projects")])
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Order Details') }}</div>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>{{ __('Worker') }}:</strong>
                            <a href="{{route('home.workers.show',$order->worker_id)}}" target="__blank">
                                {{ $order->worker->first_name }} {{ $order->worker->last_name }}
                            </a>

                        </li>
                        <li class="list-group-item"><strong>{{ __('Contract Type') }}:</strong> {{ $order->contract_type }}</li>
                        <li class="list-group-item"><strong>{{ __('Contract Start Duration') }}:</strong> {{ $order->contract_start_duration }}</li>
                        <li class="list-group-item"><strong>{{ __('Contract End Duration') }}:</strong> {{ $order->contract_end_duration }}</li>
                        <li class="list-group-item"><strong>{{ __('Amount') }}:</strong> {{ $order->amount }}</li>
                        <li class="list-group-item"><strong>{{ __('Additional Information') }}:</strong> {{ $order->additional_information }}</li>
                        <li class="list-group-item"><strong>{{ __('Status') }}:</strong> {{ $order->status->name }}</li>
                        <li class="list-group-item"><strong>{{ __('Country') }}:</strong> {{ $order->deliveryAddress->country->name }}</li>
                        <li class="list-group-item"><strong>{{ __('City') }}:</strong> {{ $order->deliveryAddress->city }}</li>
                        <li class="list-group-item"><strong>{{ __('Address') }}:</strong> {{ $order->deliveryAddress->address }}</li>
                    </ul>

                    <div id="map" style="height: 300px; width: 100%; margin-top: 20px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
@endsection

@section('scripts')
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var latitude = "{{ $order->deliveryAddress->latitude }}";
        var longitude = "{{ $order->deliveryAddress->longitude }}";
        var address = "{{ $order->deliveryAddress->address }}";
        var map = L.map('map').setView([latitude, longitude], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var marker = L.marker([latitude, longitude], {
            draggable: false
        }).addTo(map);

        marker.bindPopup(address).openPopup();
    });
</script>
@endsection