@extends('account.dashboard.layouts.shared.app-layout')

@section('title')
@include("account.dashboard.layouts.shared.includes.title-meta", ["title" => __("Show Invoice")])
@endsection

@section('page-title')
@include("account.dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Invoices"), "title" => __("Show Invoice")])
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-3 text-center">
                    <h5 class="card-title">{{ __("Invoice Details") }}</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>{{ __("Title") }}</th>
                                <td>{{ $invoice->title }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Description") }}</th>
                                <td>{{ $invoice->description }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Amount") }}</th>
                                <td>{{ $invoice->amount }} {{__('SAR')}} </td>
                            </tr>
                            <tr>
                                <th>{{ __("Due Date") }}</th>
                                <td>{{ $invoice->due_date }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Type") }}</th>
                                <td>{{ $invoice->type }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Account") }}</th>
                                <td>{{ $invoice->account->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Worker") }}</th>
                                <td>{{ $invoice->worker->first_name }} {{ $invoice->worker->last_name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Billing Address") }}</th>
                                <td>{{ $invoice->billing_address }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Status") }}</th>
                                <td>{{ __($invoice->status->name) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->
@endsection