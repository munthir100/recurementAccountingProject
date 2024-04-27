<?php

namespace App\Models;

use App\Filters\BlogFilters;
use App\Traits\HasStatus;
use Essa\APIToolKit\Filters\Filterable;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\InteractsWithMedia;

class Blog extends Model implements HasMedia
{
    use HasFactory, HasStatus, InteractsWithMedia, Filterable;

    protected $default_filters = BlogFilters::class;

    protected $fillable = ['title', 'context', 'author_id', 'status_id', 'published_at'];

    const STATUSES = [
        Status::PUBLISHED => 'Published',
        Status::NOT_PUBLISHED => 'Not Published',
    ];    
    
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
