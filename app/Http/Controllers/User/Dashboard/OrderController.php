<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Dashboard\CreateOrderRequest;
use App\Http\Requests\User\Dashboard\UpdateOrderRequest;

class OrderController extends Controller
{
    public function index()
    {
        $new = Order::isNew()->sum('amount');
        $pending = Order::isPending()->sum('amount');
        $processing = Order::isProcessing()->sum('amount');
        $delivered = Order::isDelivered()->sum('amount');
        $partially_completed = Order::isPartiallyCompleted()->sum('amount');
        $completed = Order::isCompleted()->sum('amount');
        $failed = Order::isFailed()->sum('amount');
        $cancelled = Order::isCancelled()->sum('amount');

        $orders = Order::useFilters()->dynamicPaginate();

        return view('user.dashboard.reports.orders.index', compact(
            'orders',
            'new',
            'pending',
            'processing',
            'delivered',
            'partially_completed',
            'completed',
            'failed',
            'cancelled'
        ));
    }

    public function create()
    {
        return view('user.dashboard.reports.orders.create');
    }

    public function store(CreateOrderRequest $request)
    {
        $order = Order::create($request->validated());

        return to_route('user.dashboard.reports.orders.index')->with('success', 'created successfully');
    }

    public function show(Order $order)
    {
        return view('user.dashboard.reports.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('user.dashboard.reports.orders.edit', compact('order'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->validated());

        return to_route('user.dashboard.reports.orders.index')->with('success', 'updated successfully');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return to_route('user.dashboard.reports.orders.index')->with('success', 'deleted successfully');
    }
}
