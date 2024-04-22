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
        $invoices = Invoice::dynamicPaginate();

        return view('user.dashboard.invoices.index', compact('invoices'));
    }

    public function create()
    {
        return view('user.dashboard.invoices.create');
    }

    public function store(CreateInvoiceRequest $request)
    {
        $invoice = Invoice::create($request->validated());

        return to_route('user.dashboard.invoices.index')->with('success', 'created successfully');
    }

    public function show(Invoice $invoice)
    {
        view('user.dashboard.invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        return view('user.dashboard.invoices.edit', compact('invoice'));
    }

    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $invoice->update($request->validated());

        return to_route('user.dashboard.invoices.index')->with('success', 'updated successfully');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return to_route('user.dashboard.invoices.index')->with('success', 'deleted successfully');
    }
}
