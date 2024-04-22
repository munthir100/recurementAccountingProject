<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Models\Transaction;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Dashboard\CreateTransactionRequest;
use App\Http\Requests\User\Dashboard\UpdateTransactionRequest;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::dynamicPaginate();

        return view('user.dashboard.transactions.index', compact('transactions'));
    }

    public function create()
    {
        return view('user.dashboard.transactions.create');
    }

    public function store(CreateTransactionRequest $request)
    {
        $transaction = Transaction::create($request->validated());

        return to_route('user.dashboard.transactions.index')->with('success', 'created successfully');
    }

    public function show(Transaction $transaction)
    {
        view('user.dashboard.transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        return view('user.dashboard.transactions.edit', compact('transaction'));
    }

    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $transaction->update($request->validated());

        return to_route('user.dashboard.transactions.index')->with('success', 'updated successfully');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return to_route('user.dashboard.transactions.index')->with('success', 'deleted successfully');
    }
}
