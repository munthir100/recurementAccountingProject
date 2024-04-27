@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Show Transaction")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Transactions"), "title" => __("Show Transaction")])
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-3 text-center">
                    <h5 class="card-title">{{ __("Transaction Details") }}</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>{{ __("Transaction Type") }}</th>
                                <td>{{ __($transaction->transactionType->name) }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Amount") }}</th>
                                <td>{{ $transaction->amount }} {{__('SAR')}}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Date") }}</th>
                                <td>{{ $transaction->date }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Status") }}</th>
                                <td>{{ __($transaction->status->name) }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Transaction Category") }}</th>
                                <td>
                                    @if ($transaction->transactionable_type === 'App\Models\Order')
                                    <a href="{{ route('user.dashboard.reports.orders.show',$transaction->transactionable_id) }}">
                                        {{ __('Order Transaction') }}
                                    </a>
                                    @elseif ($transaction->transactionable_type === 'App\Models\Invoice')
                                    <a href="{{ route('user.dashboard.reports.invoice.show',$transaction->transactionable_id) }}">
                                        {{ __('Invoice Transaction') }}
                                    </a>
                                    @elseif ($transaction->transactionable_type === 'App\Models\Account')
                                    <a href="{{route('user.dashboard.accounts.show',$transaction->transactionable_id)}}">
                                        {{ __('Account Transaction') }}
                                    </a>
                                    <!-- Add more elseif statements for other transactionable types -->
                                    @else
                                    {{ $transaction->transactionable_type }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>{{ __("Transaction Category ID") }}</th>
                                <td>{{ $transaction->transactionable_id }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Description") }}</th>
                                <td>{{ $transaction->description }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->
@endsection