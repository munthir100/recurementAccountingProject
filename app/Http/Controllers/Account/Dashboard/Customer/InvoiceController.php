<?php

namespace App\Http\Controllers\Account\Dashboard\Customer;

use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function index()
    {
        $paid = request()->user('account')->invoices()->isPaid()->sum('amount');
        $new = request()->user('account')->invoices()->isnew()->sum('amount');
        $overdue = request()->user('account')->invoices()->isOverdue()->sum('amount');
        $cancelled = request()->user('account')->invoices()->isCancelled()->sum('amount');
        $refunded = request()->user('account')->invoices()->isRefunded()->sum('amount');
        $disputed = request()->user('account')->invoices()->isDisputed()->sum('amount');
        $void = request()->user('account')->invoices()->isVoid()->sum('amount');
        $archived = request()->user('account')->invoices()->isArchived()->sum('amount');
        $scheduled = request()->user('account')->invoices()->isScheduled()->sum('amount');
        $invoices = request()->user('account')->invoices()->useFilters()->dynamicPaginate();

        return view('account.dashboard.customer.invoices.index', compact(
            'invoices',
            'paid',
            'new',
            'overdue',
            'cancelled',
            'refunded',
            'disputed',
            'void',
            'archived',
            'scheduled'
        ));
    }

    public function show($id)
    {
        $invoice = request()->user('account')->invoices()->findOrFail($id);

        return view('account.dashboard.customer.invoices.show', compact('invoice'));
    }
}
