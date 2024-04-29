@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Show Discount")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Discounts"), "title" => __("Show Discount")])
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>{{ __("Title") }}</th>
                                <td>{{ $discount->title }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Description") }}</th>
                                <td>{{ $discount->description }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Type") }}</th>
                                <td>{{ __($discount->type) }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Amount") }}</th>
                                <td>{{ $discount->amount }}
                                    @if ($discount->type === 'fixed')
                                    {{__('SAR')}}
                                    @else
                                    {{__('%')}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>{{ __("End Date") }}</th>
                                <td>{{ $discount->end_date }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Account") }}</th>
                                <td>{{ $discount->account->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Status") }}</th>
                                <td>{{ __($discount->status->name) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection