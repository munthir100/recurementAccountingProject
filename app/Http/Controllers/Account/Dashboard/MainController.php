<?php

namespace App\Http\Controllers\Account\Dashboard;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\Status;

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

        return view('account.dashboard.index', compact(
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
