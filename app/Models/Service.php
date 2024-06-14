<?php

namespace App\Models;

use App\Filters\ServiceFilters;
use App\Traits\HasStatus;
use Essa\APIToolKit\Filters\Filterable;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model implements HasMedia
{
    use HasFactory, HasStatus, HasTranslations, InteractsWithMedia, Filterable;

    protected $fillable = [
        'title',
        'description',
        'is_new',
        'status_id'
    ];

    public $translatable = ['title', 'description'];
    protected $default_filters = ServiceFilters::class;
    
    const STATUSES = [
        Status::PUBLISHED => 'Published',
        Status::NOT_PUBLISHED => 'Not Published',
    ];
}
