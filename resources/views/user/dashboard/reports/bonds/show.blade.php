@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Show Bond")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Bonds"), "title" => __("Show Bond")])
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-3 text-center">
                    <h5 class="card-title">{{ __("Bond Details") }}</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>{{ __("Title") }}</th>
                                <td>{{ $bond->title }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Description") }}</th>
                                <td>{{ $bond->description }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Amount") }}</th>
                                <td>{{ $bond->amount }} {{__('SAR')}}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Interest Rate") }}</th>
                                <td>{{ $bond->interest_rate }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Maturity Date") }}</th>
                                <td>{{ $bond->maturity_date }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Issuer") }}</th>
                                <td>{{ $bond->issuer }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Date of Issue") }}</th>
                                <td>{{ $bond->date_of_issue }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Status") }}</th>
                                <td>{{ __($bond->status->name) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->
@endsection