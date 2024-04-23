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
        $allTransactions = Transaction::sum('amount');
        $pending = Transaction::isPending()->sum('amount');
        $completed = Transaction::isCompleted()->sum('amount');
        $failed = Transaction::isFailed()->sum('amount');
        $cancelled = Transaction::isCancelled()->sum('amount');
        $refunded = Transaction::isRefunded()->sum('amount');
        $reversed = Transaction::isReversed()->sum('amount');
        $processing = Transaction::isProcessing()->sum('amount');
        $partiallyCompleted = Transaction::isPartiallyCompleted()->sum('amount');

        $transactions = Transaction::useFilters()->dynamicPaginate();

        return view('user.dashboard.reports.transactions.index', compact(
            'transactions',
            'allTransactions',
            'pending',
            'completed',
            'failed',
            'cancelled',
            'refunded',
            'reversed',
            'processing',
            'partiallyCompleted',
        ));
    }

    public function create()
    {
        return view('user.dashboard.reports.transactions.create');
    }

    public function store(CreateTransactionRequest $request)
    {
        $transaction = Transaction::create($request->validated());

        return to_route('user.dashboard.reports.transactions.index')->with('success', 'created successfully');
    }

    public function show(Transaction $transaction)
    {
        return view('user.dashboard.reports.transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        return view('user.dashboard.reports.transactions.edit', compact('transaction'));
    }

    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $transaction->update($request->validated());

        return to_route('user.dashboard.reports.transactions.index')->with('success', 'updated successfully');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return back()->with('success', 'deleted successfully');
    }
}
