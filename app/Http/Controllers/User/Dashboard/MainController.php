<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CallCenter;
use App\Models\Customer;
use App\Models\Cv;
use App\Models\Office;
use App\Models\Worker;
use Illuminate\Http\Request;

class MainController extends Controller
{
    function dashboard()
    {
        $customersCount = Customer::count();
        $officesCount = Office::count();
        $workersCount = Worker::count();
        $cvsCount = Cv::count();

        return view('dashboard.index', compact(
            'customersCount',
            'officesCount',
            'workersCount',
            'cvsCount'
        ));
    }
}
