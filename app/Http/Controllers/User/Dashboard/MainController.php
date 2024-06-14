<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Models\Cv;
use App\Models\Order;
use App\Models\Office;
use App\Models\Worker;
use App\Models\Customer;
use App\Models\CallCenter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class MainController extends Controller
{
    function dashboard()
    {
        $customersCount = Customer::count();
        $officesCount = Office::count();
        $workersCount = Worker::count();
        $cvsCount = Cv::count();
        $recentOrders = Order::orderBy('created_at', 'desc')->limit(10)->get();

        return view('dashboard.index', compact(
            'customersCount',
            'officesCount',
            'workersCount',
            'cvsCount',
            'recentOrders'
        ));
    }
}
