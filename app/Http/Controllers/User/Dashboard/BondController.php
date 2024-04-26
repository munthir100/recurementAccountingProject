<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Models\Bond;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Dashboard\CreateBondRequest;
use App\Http\Requests\User\Dashboard\UpdateBondRequest;

class BondController extends Controller
{
    public function index()
    {
        $this->authorize('read bond');
        $new = Bond::isNew()->sum('amount');
        $active = Bond::isActive()->sum('amount');
        $expired = Bond::isExpired()->sum('amount');
        $cancelled = Bond::isCancelled()->sum('amount');
        $refunded = Bond::isRefunded()->sum('amount');
        $suspended = Bond::isSuspended()->sum('amount');
        $prepaid = Bond::isPrepaid()->sum('amount');

        $bonds = Bond::useFilters()->dynamicPaginate();

        return view('user.dashboard.reports.bonds.index', compact(
            'bonds',
            'new',
            'active',
            'expired',
            'cancelled',
            'refunded',
            'suspended',
            'prepaid',
        ));
    }

    public function create()
    {
        $this->authorize('create bond');
        return view('user.dashboard.reports.bonds.create');
    }

    public function store(CreateBondRequest $request)
    {
        $this->authorize('create bond');
        $bond = Bond::create($request->validated());

        return to_route('user.dashboard.reports.bonds.index')->with('success', 'created successfully');
    }

    public function show(Bond $bond)
    {
        $this->authorize('read bond');
        return view('user.dashboard.reports.bonds.show', compact('bond'));
    }

    public function edit(Bond $bond)
    {
        $this->authorize('update bond');
        return view('user.dashboard.reports.bonds.edit', compact('bond'));
    }

    public function update(UpdateBondRequest $request, Bond $bond)
    {
        $this->authorize('update bond');
        $bond->update($request->validated());

        return to_route('user.dashboard.reports.bonds.index')->with('success', 'updated successfully');
    }

    public function destroy(Bond $bond)
    {
        $this->authorize('delete bond');
        $bond->delete();

        return back()->with('success', 'deleted successfully');
    }
}
