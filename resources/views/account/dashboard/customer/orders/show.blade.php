@extends('account.dashboard.layouts.shared.app-layout')

@section('title')
@include("account.dashboard.layouts.shared.includes.title-meta", ["title" => __("orders")])
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
                        <li class="list-group-item"><strong>Worker:</strong> {{ $order->worker->first_name }} {{ $order->worker->last_name }}</li>
                        <li class="list-group-item"><strong>Contract Type:</strong> {{ $order->contract_type }}</li>
                        <li class="list-group-item"><strong>Contract Start Duration:</strong> {{ $order->contract_start_duration }}</li>
                        <li class="list-group-item"><strong>Contract End Duration:</strong> {{ $order->contract_end_duration }}</li>
                        <li class="list-group-item"><strong>Amount:</strong> {{ $order->amount }}</li>
                        <li class="list-group-item"><strong>Additional Information:</strong> {{ $order->additional_information }}</li>
                        <li class="list-group-item"><strong>Status:</strong> {{ $order->status->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("scripts")
@endsection