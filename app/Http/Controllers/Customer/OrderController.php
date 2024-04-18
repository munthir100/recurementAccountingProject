<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\PlaceOrderRequest;

class OrderController extends Controller
{
    public function placeOrder(PlaceOrderRequest $request)
    {
        $request->user('account')->customer->orders()->create($request->validated());

        return back()->with('success', 'order created');
    }
}
