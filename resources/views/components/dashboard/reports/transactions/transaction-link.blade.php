@php
    $routeName = '';
    switch($transaction->transactionable_type) {
        case App\Models\Customer::class:
            $routeName = 'user.dashboard.customers.show';
            break;
        case App\Models\Office::class:
            $routeName = 'user.dashboard.offices.show';
            break;
        case App\Models\Order::class:
            $routeName = 'user.dashboard.reports.orders.show';
            break;
        case App\Models\Contract::class:
            $routeName = 'user.dashboard.reports.contracts.show';
            break;
        case App\Models\Invoice::class:
            $routeName = 'user.dashboard.reports.invoices.show';
            break;
        case App\Models\Bond::class:
            $routeName = 'user.dashboard.reports.bonds.show';
            break;
        case App\Models\Discount::class:
            $routeName = 'user.dashboard.reports.discounts.show';
            break;
        case App\Models\Indebtedness::class:
            $routeName = 'user.dashboard.reports.indebtedness.show';
            break;
        default:
            $routeName = '';
            break;
    }
@endphp

@if(!empty($routeName))
    <a href="{{ route($routeName, $transaction->transactionable_id) }}">
        {{ __(App\Models\Transaction::TRANSACTIONABLE_MODELS[($transaction->transactionable_type)]) }}
    </a>
@else
    {{ $transaction->transactionable_type }}
@endif
