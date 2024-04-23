@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Show Contract")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Contracts"), "title" => __("Show Contract")])
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-3 text-center">
                    <h5 class="card-title">{{ __("Contract Details") }}</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>{{ __("Title") }}</th>
                                <td>{{ $contract->title }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Description") }}</th>
                                <td>{{ $contract->description }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Amount") }}</th>
                                <td>{{ $contract->amount }} {{__('SAR')}} </td>
                            </tr>
                            <tr>
                                <th>{{ __("Amount Type") }}</th>
                                <td>{{ __($contract->amount_type) }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Start Date") }}</th>
                                <td>{{ $contract->start_date }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("End Date") }}</th>
                                <td>{{ $contract->end_date }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Location") }}</th>
                                <td>{{ $contract->location }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Renewal Terms") }}</th>
                                <td>{{ $contract->renewal_terms }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Contract Category") }}</th>
                                <th>
                                    @if ($contract->contractable_type === 'App\Models\Order')
                                    <a href="{{route('user.dashboard.reports.orders.show',$contract->contractable_id)}}">
                                        {{__('Order Contract')}}
                                    </a>
                                    @elseif ($contract->contractable_type === 'App\Models\Invoice')
                                    <a href="{{route('user.dashboard.reports.invoice.show',$contract->contractable_id)}}">
                                        {{__('Invoice Contract')}}
                                    </a>
                                    @elseif ($contract->contractable_type === 'App\Models\Account')
                                    <a href="#">
                                        {{__('Account Contract')}}
                                    </a>
                                    @elseif ($contract->contractable_type === 'App\Models\Bond')
                                    <a href="{{route('user.dashboard.reports.bonds.show',$contract->contractable_id)}}">
                                        {{__('Bond Contract')}}
                                    </a>
                                    @elseif ($contract->contractable_type === 'App\Models\Contract')
                                    <a href="{{route('user.dashboard.reports.contracts.show',$contract->contractable_id)}}">
                                        {{__('Contract Contract')}}
                                    </a>
                                    @elseif ($contract->contractable_type === 'App\Models\Discount')
                                    <a href="{{route('user.dashboard.reports.discounts.show',$contract->contractable_id)}}">
                                        {{__('Discount Contract')}}
                                    </a>
                                    @elseif ($contract->contractable_type === 'App\Models\Indebtedness')
                                    <a href="{{route('user.dashboard.reports.indebtedness.show',$contract->contractable_id)}}">
                                        {{__('Indebtedness Contract')}}
                                    </a>
                                    <!-- Add more elseif statements for other contractable types -->
                                    @else
                                    {{ $contract->contractable_type }}
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <th>{{ __("Contractable Category ID") }}</th>
                                <td>{{ $contract->contractable_id }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Status") }}</th>
                                <td>{{ __($contract->status->name) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->
@endsection