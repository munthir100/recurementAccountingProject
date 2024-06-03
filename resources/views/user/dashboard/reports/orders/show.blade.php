@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Show Order")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Orders"), "title" => __("Show Order")])
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-3 text-center">
                    <h5 class="card-title">{{ __("Order Details") }}</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>{{ __("Account") }}</th>

                                <td>
                                    <a href="{{route('user.dashboard.accounts.show',$order->account->id)}}" target="__blank">
                                        {{ $order->account->name }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>{{ __("Worker") }}</th>
                                <td>
                                    <a href="{{route('home.workers.show',$order->worker->id)}}" target="__blank">
                                        {{ $order->worker->first_name }} {{ $order->worker->last_name }}
                                    </a>

                                </td>
                            </tr>
                            <tr>
                                <th>{{ __("Contract Type") }}</th>
                                <td>{{ $order->contract_type }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Contract Start Duration") }}</th>
                                <td>{{ $order->contract_start_duration }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Contract End Duration") }}</th>
                                <td>{{ $order->contract_end_duration }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Amount") }}</th>
                                <td>{{ $order->amount }} {{__('SAR')}} </td>
                            </tr>
                            <tr>
                                <th>{{ __("Additional Information") }}</th>
                                <td>{{ $order->additional_information }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Status") }}</th>
                                <td>{{ __($order->status->name) }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Country") }}</th>
                                <td>{{ $order->deliveryAddress->country->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("City") }}</th>
                                <td>{{ $order->deliveryAddress->city }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Address") }}</th>
                                <td>{{ $order->deliveryAddress->address }}</td>
                            </tr>
                        </tbody>    
                    </table>
                    <div id="map" style="height: 300px; width: 100%; margin-top: 20px;"></div>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->
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