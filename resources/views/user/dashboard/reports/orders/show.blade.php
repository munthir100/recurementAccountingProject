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
                                <td>{{ $order->account->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Worker") }}</th>
                                <td>{{ $order->worker->first_name }} {{ $order->worker->last_name }}</td>
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
                        </tbody>
                    </table>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->
@endsection
