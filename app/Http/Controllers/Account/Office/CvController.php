<?php

namespace App\Http\Controllers\Account\Office;

use App\Models\Cv;
use App\Models\Status;
use App\Models\Worker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CvController extends Controller
{
    public function index()
    {
        $cvs = Cv::whereRelation('office', 'id', '=', request()->user('account')->office->id)->dynamicPaginate();

        return view('account.office.cv.index', compact('cvs'));
    }

    public function store(Request $request)
    {
        $request->validate(['cv' => 'required|file|max:2048']);

        $cv = $request->user('account')->office->cvs()->create([]);

        $cv->addMedia($request->file('cv'))->toMediaCollection('cvs');

        return redirect()->back()->with('success', 'cv created successfully.');
    }
}
