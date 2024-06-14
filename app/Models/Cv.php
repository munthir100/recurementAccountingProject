<?php

namespace App\Models;

use App\Models\Office;
use App\Traits\HasStatus;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cv extends Model implements HasMedia
{
    use HasFactory, HasStatus, InteractsWithMedia, LogsActivity;

    protected $fillable = ['office_id', 'status_id'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnlyDirty();
    }
    const STATUSES = [
        Status::NEW => 'New',
        Status::FILLED => 'Filled',
    ];
    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function worker()
    {
        return $this->hasOne(Worker::class);
    }
}
