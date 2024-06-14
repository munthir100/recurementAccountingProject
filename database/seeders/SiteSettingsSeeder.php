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
        SiteSetting::updateOrCreate([], [
            'name' => [
                'en' => 'Rayak',
                'ar' => 'رايك'
            ],
            'description' => [
                'en' => 'we provide you with the best services and security',
                'ar' => 'نقدم لك خدمات متكاملة وأمان'
            ],
            'whatsapp_number' => '+966512345678',
            'contact_email' => 'rayak@example.com',
            'contact_phone' => '+966501234567',
            'settings' => $data
        ]);
    }
}
