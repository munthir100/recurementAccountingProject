<?php

namespace App\Models;

use App\Traits\HasStatus;
use App\Filters\BlogFilters;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Activitylog\LogOptions;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model implements HasMedia
{
    use HasFactory, HasStatus, InteractsWithMedia, Filterable, LogsActivity;

    protected $default_filters = BlogFilters::class;

    protected $fillable = ['title', 'context', 'author_id', 'status_id', 'published_at'];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnlyDirty();
    }

    const STATUSES = [
        Status::PUBLISHED => 'Published',
        Status::NOT_PUBLISHED => 'Not Published',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
