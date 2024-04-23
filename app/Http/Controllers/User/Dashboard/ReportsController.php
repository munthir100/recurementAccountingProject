<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Models\Bond;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\Contract;
use App\Models\Discount;
use App\Models\Transaction;
use App\Models\Indebtedness;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    public function index()
    {
        $totalTransactions = Transaction::sum('amount');
        $totalOrder = Order::sum('amount');
        $totalInvoice = Invoice::sum('amount');
        $totalBond = Bond::sum('amount');
        $totalContract = Contract::sum('amount');
        $totalDiscount = Discount::sum('amount');
        $totalIndebtedness = Indebtedness::sum('amount');

        $recentTransactions = Transaction::orderBy('created_at', 'desc')->limit(10)->get();

        return view('user.dashboard.reports.index', compact(
            'totalTransactions',
            'totalOrder',
            'totalInvoice',
            'totalBond',
            'totalContract',
            'totalDiscount',
            'totalIndebtedness',
            'recentTransactions',
        ));
    }
}
