<?php

namespace App\Http\Controllers\User\Dashboard\Account\Settings;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Dashboard\Settings\UpdateBannerRequest;
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

    public function banner()
    {
        $siteSettings = SiteSetting::first();

        return view('user.dashboard.settings.siteSettings.banner', compact('siteSettings'));
    }

    public function updateTopbar(UpdateTopbarRequest $request)
    {
        $validatedData = $request->validated();

        $siteSettings = SiteSetting::first();

        $settings = $siteSettings->getAttribute('settings');
        $settings['top_bar'] = $validatedData['top_bar'];
        $siteSettings->setAttribute('settings', $settings);

        $siteSettings->save();

        return back()->with('success', 'updated successfully');
    }

    public function updateBanner(UpdateBannerRequest $request)
    {
        $validatedData = $request->validated();

        $siteSettings = SiteSetting::first();

        $settings = $siteSettings->getAttribute('settings');
        $settings['banners'] = $validatedData['banners'];
        $siteSettings->setAttribute('settings', $settings);

        $siteSettings->save();

        return back()->with('success', 'updated successfully');
    }
}
