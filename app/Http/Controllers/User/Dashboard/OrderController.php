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
        $orders = Order::dynamicPaginate();

        return view('user.dashboard.orders.index', compact('orders'));
    }

    public function create()
    {
        return view('user.dashboard.orders.create');
    }

    public function store(CreateOrderRequest $request)
    {
        $order = Order::create($request->validated());

        return view('user.dashboard.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        view('user.dashboard.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('user.dashboard.orders.edit', compact('order'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->validated());

        return view('user.dashboard.orders.index', compact('orders'));
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return view('user.dashboard.orders.index', compact('orders'));
    }
}
