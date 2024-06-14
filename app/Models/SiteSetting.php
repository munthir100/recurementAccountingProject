<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SiteSetting extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;

    protected $fillable = [
        'name',
        'description',
        'whatsapp_number',
        'contact_email',
        'contact_phone',
        'settings',
    ];

    public $translatable = ['name', 'description'];


    protected $casts = [
        'settings' => 'array',
    ];
}
