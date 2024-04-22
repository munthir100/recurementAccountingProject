<?php

namespace App\Http\Controllers\Account\Dashboard\Customer;

use App\Http\Controllers\Controller;

class MainController extends Controller
{
    function dashboard()
    {
        $newOrders = request()->user('account')->customer->orders()->isNew()->count();
        $pendingOrders = request()->user('account')->customer->orders()->isPending()->count();
        $processingOrders = request()->user('account')->customer->orders()->isProcessing()->count();
        $cancelledOrders = request()->user('account')->customer->orders()->isCancelled()->count();
        $deliveredOrders = request()->user('account')->customer->orders()->isDelivered()->count();
        $completedOrders = request()->user('account')->customer->orders()->isCompleted()->count();
        $totalOrders = request()->user('account')->customer->orders()->count();
        $orders = request()->user('account')->customer->orders()->dynamicPaginate()->take(6);

        return view('account.dashboard.customer.index', compact(
            'newOrders',
            'pendingOrders',
            'processingOrders',
            'cancelledOrders',
            'deliveredOrders',
            'completedOrders',
            'totalOrders',
            'orders',
        ));
    }
}
