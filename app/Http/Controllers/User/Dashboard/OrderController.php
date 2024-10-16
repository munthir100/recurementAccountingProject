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
        $this->authorize('read order');
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
        $this->authorize('create order');
        return view('user.dashboard.reports.orders.create');
    }

    public function store(CreateOrderRequest $request)
    {
        $this->authorize('create order');
        $validatedData = $request->validated();
        $order = Order::create($validatedData);
        $order->deliveryAddress()->create($validatedData['delivery_address']);

        return to_route('user.dashboard.reports.orders.index')->with('success', 'created successfully');
    }

    public function show(Order $order)
    {
        $this->authorize('read order');
        return view('user.dashboard.reports.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $this->authorize('update order');
        return view('user.dashboard.reports.orders.edit', compact('order'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $this->authorize('update order');
       $validatedData = $request->validated();
        $order->update($validatedData);
        $order->deliveryAddress()->update($validatedData['delivery_address']);
        
        return to_route('user.dashboard.reports.orders.index')->with('success', 'updated successfully');
    }

    public function destroy(Order $order)
    {
        $this->authorize('delete order');
        $order->delete();

        return to_route('user.dashboard.reports.orders.index')->with('success', 'deleted successfully');
    }
}
