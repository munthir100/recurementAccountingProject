@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Offices")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Offices"), "title" => __("Home")])
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>{{ __("ID") }}</th>
                                <td>{{ $office->account->id }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Name") }}</th>
                                <td>{{ $office->account->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Email") }}</th>
                                <td>{{ $office->account->email }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Phone") }}</th>
                                <td>{{ $office->account->phone }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Location") }}</th>
                                <td>{{ $office->location }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Status") }}</th>
                                <td><x-dashboard.table-status-badge statusId="{{ $office->account->status_id }}" /></td>
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
<div>
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
</div>
