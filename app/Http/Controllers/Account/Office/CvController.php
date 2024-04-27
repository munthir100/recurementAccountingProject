<?php

namespace App\Http\Controllers\Account\Office;

use App\Models\Cv;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CvController extends Controller
{
    public function index()
    {
        $cvs = Cv::whereRelation('office', 'id', '=', request()->user('account')->office->id)->dynamicPaginate();

        return view('account.dashboard.office.cvs.index', compact('cvs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $cv = $request->user('account')->office->cvs()->create([]);

        $cv->addMedia($request->file('cv'))->toMediaCollection('cvs');

        return redirect()->back()->with('success', 'cv created successfully.');
    }

    public function destroy($id)
    {
        request()->user('account')->office->cvs()->findOrFail($id)->delete();

        return back()->with('success', 'cv deleted');
    }
}
