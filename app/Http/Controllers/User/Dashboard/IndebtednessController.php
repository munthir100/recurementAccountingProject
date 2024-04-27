<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Models\Indebtedness;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Dashboard\CreateIndebtednessRequest;
use App\Http\Requests\User\Dashboard\UpdateIndebtednessRequest;

class IndebtednessController extends Controller
{
    public function index()
    {
        $this->authorize('read indebtedness');
        $pending = Indebtedness::isPending()->sum('amount');
        $active = Indebtedness::isActive()->sum('amount');
        $overdue = Indebtedness::isOverdue()->sum('amount');
        $paid = Indebtedness::isPaid()->sum('amount');
        $partially_paid = Indebtedness::isPartiallyPaid()->sum('amount');
        $cancelled = Indebtedness::isCancelled()->sum('amount');
        $refunded = Indebtedness::isRefunded()->sum('amount');
        $disputed = Indebtedness::isDisputed()->sum('amount');
        $void = Indebtedness::isVoid()->sum('amount');

        $indebtednesses = Indebtedness::useFilters()->dynamicPaginate();

        return view('user.dashboard.reports.indebtedness.index', compact(
            'indebtednesses',
            'pending',
            'active',
            'overdue',
            'paid',
            'partially_paid',
            'cancelled',
            'refunded',
            'disputed',
            'void',
        ));
    }

    public function create()
    {
        $this->authorize('create indebtedness');
        return view('user.dashboard.reports.indebtedness.create');
    }

    public function store(CreateIndebtednessRequest $request)
    {
        $this->authorize('create indebtedness');
        $indebtedness = Indebtedness::create($request->validated());

        return to_route('user.dashboard.reports.indebtedness.index')->with('success', 'created successfully');
    }

    public function show(Indebtedness $indebtedness)
    {
        $this->authorize('read indebtedness');
        return view('user.dashboard.reports.indebtedness.show', compact('indebtedness'));
    }

    public function edit(Indebtedness $indebtedness)
    {
        $this->authorize('update indebtedness');
        return view('user.dashboard.reports.indebtedness.edit', compact('indebtedness'));
    }

    public function update(UpdateIndebtednessRequest $request, Indebtedness $indebtedness)
    {
        $this->authorize('update indebtedness');
        $indebtedness->update($request->validated());

        return to_route('user.dashboard.reports.indebtedness.index')->with('success', 'updated successfully');
    }

    public function destroy(Indebtedness $indebtedness)
    {
        $this->authorize('delete indebtedness');
        $indebtedness->delete();

        return back()->with('success', 'deleted successfully');
    }
}
