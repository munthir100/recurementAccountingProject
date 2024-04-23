<?php

namespace App\Http\Controllers\Account\Dashboard\Customer;

use App\Http\Controllers\Controller;

class MainController extends Controller
{
    function dashboard()
    {
        $newOrders = request()->user('account')->orders()->isNew()->count();
        $pendingOrders = request()->user('account')->orders()->isPending()->count();
        $processingOrders = request()->user('account')->orders()->isProcessing()->count();
        $cancelledOrders = request()->user('account')->orders()->isCancelled()->count();
        $deliveredOrders = request()->user('account')->orders()->isDelivered()->count();
        $completedOrders = request()->user('account')->orders()->isCompleted()->count();
        $totalOrders = request()->user('account')->orders()->count();
        $orders = request()->user('account')->orders()->dynamicPaginate()->take(6);

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
