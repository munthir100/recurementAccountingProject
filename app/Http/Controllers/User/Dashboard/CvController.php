<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Models\Cv;
use App\Models\Office;
use App\Models\Worker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\Office\CreateCvRequest;
use App\Http\Requests\User\Dashboard\Cvs\UpdateCvRequest;

class CvController extends Controller
{
    public function index()
    {
        $workersCvs = Cv::with('office.account')->dynamicPaginate();
        $offices = Office::with('account')->get();

        return view('dashboard.cvs.index', compact('workersCvs', 'offices'));
    }

    public function store(CreateCvRequest $request)
    {
        $cv = Cv::create([
            'office_id' => $request->office_id
        ]);

        $cv->addMediaFromRequest('cv')->toMediaCollection('cvs');

        return redirect()->route('user.dashboard.cvs.index')->with('success', 'Cv created successfully.');
    }

    public function edit(Cv $cv)
    {
        $offices = Office::all();
        return view('dashboard.cvs.edit', compact('cv', 'offices'));
    }

    public function update(UpdateCvRequest $request, Cv $cv)
    {
        $cv->office_id = $request->input('office_id');
        $cv->save();

        if ($request->hasFile('cv')) {
            $cv->clearMediaCollection('cvs');
            $cv->addMediaFromRequest('cv')->toMediaCollection('cvs');
        }

        return back()->with('success', 'Cv updated successfully.');
    }

    public function destroy(Cv $cv)
    {
        $cv->delete();
        return redirect()->route('dashboard.cvs.index')->with('success', 'Cv deleted successfully.');
    }
}
