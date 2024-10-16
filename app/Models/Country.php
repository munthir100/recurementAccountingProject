<?php

namespace App\Models;

use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Country extends Model implements HasMedia
{
    use HasFactory, HasStatus, InteractsWithMedia;

    protected $fillable = ['name', 'status_id', 'currency_id'];

    const STATUSES = [
        Status::PUBLISHED => 'Published',
        Status::NOT_PUBLISHED => 'Not Published',
    ];

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
