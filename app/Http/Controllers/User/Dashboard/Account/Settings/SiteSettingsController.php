<?php
/*

<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SiteSetting extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia,HasTranslations;

    protected $fillable = [
        'name',
        'description',
        'settings'
    ];

    public $translatable = ['name', 'description'];


    protected $casts = [
        'settings' => 'array',
    ];
}

*/

namespace App\Http\Controllers\User\Dashboard\Account\Settings;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSiteSettingRequest;
use App\Http\Requests\User\Dashboard\Settings\UpdateBannerRequest;
use App\Http\Requests\User\Dashboard\Settings\UpdateTopbarRequest;

class SiteSettingsController extends Controller
{
    public function index()
    {
        return view('user.dashboard.settings.siteSettings.index');
    }

    public function getGenralData(Request $request)
    {
        $siteSettings = SiteSetting::first();

        return view('user.dashboard.settings.siteSettings.genralData', compact('siteSettings'));
    }

    public function updateGenralData(UpdateSiteSettingRequest $request)
    {
        $validatedData = $request->validated();
        $siteSettings = SiteSetting::first();
        $siteSettings->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'contact_email' => $validatedData['contact_email'],
            'contact_phone' => $validatedData['contact_phone'],
            'whatsapp_number' => $validatedData['whatsapp_number'],
        ]);

        if ($request->hasFile('logo')) {
            $siteSettings->clearMediaCollection('logo');
            $siteSettings->addMedia($request->file('logo'))
                ->toMediaCollection('logo');
        }

        if ($request->hasFile('icon')) {
            $siteSettings->clearMediaCollection('icon');
            $siteSettings->addMedia($request->file('icon'))
                ->toMediaCollection('icon');
        }

        return back()->with('success', 'updated successfully');
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
