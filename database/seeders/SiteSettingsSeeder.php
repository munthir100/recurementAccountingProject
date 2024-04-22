<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\File;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFile = File::get(resource_path('json/site-settings.json'));
        $data = json_decode($jsonFile, true);
        SiteSetting::updateOrCreate([], ['settings' => $data]);
    }
}
