<?php

namespace App\Models;

use App\Traits\HasStatus;
use App\Traits\HasUploads;
use App\Filters\WorkerFilters;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Activitylog\LogOptions;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Worker extends Model implements HasMedia
{
    use HasFactory, HasStatus, InteractsWithMedia, Filterable, LogsActivity;

    protected $default_filters = WorkerFilters::class;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnlyDirty();
    }
    protected $fillable = [
        'first_name',
        'last_name',
        'job',
        'month_salary',
        'contract_period',
        'languages',
        'nationality',
        'age',
        'type',
        'tall',
        'religion',
        'place_of_birth',
        'children',
        'education',
        'birth_date',
        'weight',
        'practical_experience',
        'work_experience_country',
        'years_of_experience',
        'main_image',
        'related_images',
        'office_id',
        'status_id',
        'cv_id'
    ];

    const STATUSES = [
        Status::PUBLISHED => 'Published',
        Status::NOT_PUBLISHED => 'Not Published',
    ];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}
