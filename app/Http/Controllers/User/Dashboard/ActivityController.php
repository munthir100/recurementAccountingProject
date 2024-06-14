<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::with('causer', 'subject')->dynamicPaginate();

        return view('dashboard.activities.index', compact('activities'));
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();

        return redirect()->route('user.dashboard.activities.index')->with('success', 'deleted successfully.');
    }
}
