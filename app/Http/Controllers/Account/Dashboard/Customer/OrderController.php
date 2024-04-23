<?php

namespace App\Http\Controllers\Account\Dashboard\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\PlaceOrderRequest;
use App\Models\Status;
use App\Models\Worker;

class OrderController extends Controller
{
    public function index()
    {
        $orders = request()->user('account')->orders()->dynamicPaginate();

        return view('account.dashboard.customer.orders.index', compact('orders'));
    }
    public function show($id)
    {
        $order = request()->user('account')->orders()->findOrFail($id);

        return view('account.dashboard.customer.orders.show', compact('order'));
    }
    public function create()
    {
        // select name and id form Worker
        $workers = Worker::select('first_name', 'last_name', 'id')->get();

        return view('account.dashboard.customer.orders.create', compact('workers'));
    }

    public function edit($id)
    {
        $order = request()->user('account')->orders()->findOrFail($id);

        return view('account.dashboard.customer.orders.edit', compact('order'));
    }

    public function update(PlaceOrderRequest $request, $id)
    {
        $order = request()->user('account')->orders()->findOrFail($id);

        $order->update($request->validated());

        return back()->with('success', 'order updated');
    }

    public function store(PlaceOrderRequest $request)
    {
        $request->user('account')->orders()->create($request->validated());

        return back()->with('success', 'order created');
    }

    public function placeOrder(PlaceOrderRequest $request)
    {
        $request->user('account')->orders()->create($request->validated());

        return back()->with('success', 'order created');
    }

    public function cancelOrder($id)
    {
        $order = request()->user('account')->orders()->findOrFail($id);
        $order->setStatus(Status::CANCELLED);

        return back()->with('success', 'order canceled');
    }
}
