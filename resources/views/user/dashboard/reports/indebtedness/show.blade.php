@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Show Indebtedness")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Indebtednesses"), "title" => __("Show Indebtedness")])
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="card-title">{{ __("Indebtedness Details") }}</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>{{ __("Title") }}</th>
                                        <td>{{ $indebtedness->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __("Description") }}</th>
                                        <td>{{ $indebtedness->description }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __("Amount") }}</th>
                                        <td>{{ $indebtedness->amount }} {{__('SAR')}} </td>
                                    </tr>
                                    <tr>
                                        <th>{{ __("Due Date") }}</th>
                                        <td>{{ $indebtedness->due_date }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __("Type") }}</th>
                                        <td>{{ __($indebtedness->type) }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __("Account") }}</th>
                                        <td>{{ $indebtedness->account->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __("Collateral") }}</th>
                                        <td>{{ $indebtedness->collateral }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __("Status") }}</th>
                                        <td>{{ __($indebtedness->status->name) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection