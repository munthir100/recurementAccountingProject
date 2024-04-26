<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Models\Discount;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Dashboard\CreateDiscountRequest;
use App\Http\Requests\User\Dashboard\UpdateDiscountRequest;

class DiscountController extends Controller
{
    public function index()
    {
        $this->authorize('read discount');
        $active = Discount::isActive()->sum('amount');
        $not_active = Discount::isNotActive()->sum('amount');
        $expired = Discount::isExpired()->sum('amount');
        $cancelled = Discount::isCancelled()->sum('amount');
        $used = Discount::isUsed()->sum('amount');
        $rejected = Discount::isRejected()->sum('amount');
        $scheduled = Discount::isScheduled()->sum('amount');
        $suspended = Discount::isSuspended()->sum('amount');
        $deactivated = Discount::isDeactivated()->sum('amount');
        $limited_availability = Discount::isLimitedAvailability()->sum('amount');


        $discounts = Discount::useFilters()->dynamicPaginate();

        return view('user.dashboard.reports.discounts.index', compact(
            'discounts',
            'active',
            'not_active',
            'expired',
            'cancelled',
            'used',
            'rejected',
            'scheduled',
            'suspended',
            'deactivated',
            'limited_availability',
        ));
    }

    public function create()
    {
        $this->authorize('create discount');
        return view('user.dashboard.reports.discounts.create');
    }

    public function store(CreateDiscountRequest $request)
    {
        $this->authorize('create discount');
        $discount = Discount::create($request->validated());

        return to_route('user.dashboard.reports.discounts.index')->with('success', 'created successfully');
    }

    public function show(Discount $discount)
    {
        $this->authorize('read discount');
        return view('user.dashboard.reports.discounts.show', compact('discount'));
    }

    public function edit(Discount $discount)
    {
        $this->authorize('update discount');
        return view('user.dashboard.reports.discounts.edit', compact('discount'));
    }

    public function update(UpdateDiscountRequest $request, Discount $discount)
    {
        $this->authorize('update discount');
        $discount->update($request->validated());

        return to_route('user.dashboard.reports.discounts.index')->with('success', 'updated successfully');
    }

    public function destroy(Discount $discount)
    {
        $this->authorize('delete discount');
        $discount->delete();

        return to_route('user.dashboard.reports.discounts.index')->with('success', 'deleted successfully');
    }
}
