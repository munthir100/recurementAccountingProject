<?php

namespace App\Http\Controllers\User\Dashboard\Account\Settings;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Dashboard\Settings\UpdateTopbarRequest;

class SiteSettingsController extends Controller
{
    public function index()
    {
        return view('user.dashboard.settings.siteSettings.index');
    }

    public function topBar()
    {
        $siteSettings = SiteSetting::first();

        return view('user.dashboard.settings.siteSettings.topBar', compact('siteSettings'));
    }

    public function update(UpdateTopbarRequest $request)
    {
        $validatedData = $request->validated();
        $siteSetting = SiteSetting::first();

        $siteSetting->settings = [
            'top_bar' => $validatedData['top_bar']
        ];
        $siteSetting->save();

        return back()->with('success', 'updated successfully');
    }
}
