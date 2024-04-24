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
        $new = request()->user('account')->orders()->isNew()->sum('amount');
        $pending = request()->user('account')->orders()->isPending()->sum('amount');
        $processing = request()->user('account')->orders()->isProcessing()->sum('amount');
        $delivered = request()->user('account')->orders()->isDelivered()->sum('amount');
        $partially_completed = request()->user('account')->orders()->isPartiallyCompleted()->sum('amount');
        $completed = request()->user('account')->orders()->isCompleted()->sum('amount');
        $failed = request()->user('account')->orders()->isFailed()->sum('amount');
        $cancelled = request()->user('account')->orders()->isCancelled()->sum('amount');

        $orders = request()->user('account')->orders()->useFilters()->dynamicPaginate();

        return view('account.dashboard.customer.orders.index', compact(
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
