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
        $discounts = Discount::dynamicPaginate();

        return view('user.dashboard.discounts.index', compact('discounts'));
    }

    public function create()
    {
        return view('user.dashboard.discounts.create');
    }

    public function store(CreateDiscountRequest $request)
    {
        $discount = Discount::create($request->validated());

        return to_route('user.dashboard.discounts.index')->with('success', 'created successfully');
    }

    public function show(Discount $discount)
    {
        view('user.dashboard.discounts.show', compact('discount'));
    }

    public function edit(Discount $discount)
    {
        return view('user.dashboard.discounts.edit', compact('discount'));
    }

    public function update(UpdateDiscountRequest $request, Discount $discount)
    {
        $discount->update($request->validated());

        return to_route('user.dashboard.discounts.index')->with('success', 'updated successfully');
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();

        return to_route('user.dashboard.discounts.index')->with('success', 'deleted successfully');
    }
}
