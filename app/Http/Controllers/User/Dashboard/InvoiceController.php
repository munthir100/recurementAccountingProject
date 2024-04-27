<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Models\Invoice;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Dashboard\CreateInvoiceRequest;
use App\Http\Requests\User\Dashboard\UpdateInvoiceRequest;

class InvoiceController extends Controller
{
    public function index()
    {
        $this->authorize('read invoice');
        $paid = Invoice::isPaid()->sum('amount');
        $new = Invoice::isnew()->sum('amount');
        $overdue = Invoice::isOverdue()->sum('amount');
        $cancelled = Invoice::isCancelled()->sum('amount');
        $refunded = Invoice::isRefunded()->sum('amount');
        $disputed = Invoice::isDisputed()->sum('amount');
        $void = Invoice::isVoid()->sum('amount');
        $archived = Invoice::isArchived()->sum('amount');
        $scheduled = Invoice::isScheduled()->sum('amount');
        $invoices = Invoice::useFilters()->dynamicPaginate();

        return view('user.dashboard.reports.invoices.index', compact(
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

    public function create()
    {
        $this->authorize('create invoice');
        return view('user.dashboard.reports.invoices.create');
    }

    public function store(CreateInvoiceRequest $request)
    {
        $this->authorize('create invoice');
        $invoice = Invoice::create($request->validated());

        return to_route('user.dashboard.reports.invoices.index')->with('success', 'created successfully');
    }

    public function show(Invoice $invoice)
    {
        $this->authorize('read invoice');
        return view('user.dashboard.reports.invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        $this->authorize('update invoice');
        return view('user.dashboard.reports.invoices.edit', compact('invoice'));
    }

    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $this->authorize('update invoice');
        $invoice->update($request->validated());

        return to_route('user.dashboard.reports.invoices.index')->with('success', 'updated successfully');
    }

    public function destroy(Invoice $invoice)
    {
        $this->authorize('delete invoice');
        $invoice->delete();

        return to_route('user.dashboard.reports.invoices.index')->with('success', 'deleted successfully');
    }
}
