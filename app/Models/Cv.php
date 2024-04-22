<?php

namespace App\Models;

use App\Models\Office;
use App\Traits\HasStatus;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cv extends Model implements HasMedia
{
    use HasFactory, HasStatus, InteractsWithMedia;

    protected $fillable = ['office_id', 'status_id'];

    const STATUSES = [
        Status::NEW,
        Status::FILLED,
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
