<?php

namespace App\Http\Controllers\Account\Dashboard\Office;

use App\Models\Cv;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function dashboard()
    {
        $cvs = request()->user('account')->office->cvs();
        $newCvs = $cvs->isNew()->count();
        $pendingCvs = $cvs->isPending()->count();
        $filledCvs = $cvs->isFilled()->count();
        $rejectedCvs = $cvs->isRejected()->count();
        $totalCvs = $pendingCvs + $filledCvs + $rejectedCvs;
        $cvs = request()->user('account')->office->cvs()->dynamicPaginate();

        return view('account.dashboard.office.index', compact(
            'newCvs',
            'pendingCvs',
            'filledCvs',
            'rejectedCvs',
            'totalCvs',
            'cvs'
        ));
    }
}
