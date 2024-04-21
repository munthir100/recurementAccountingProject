<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Office extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['location', 'account_id'];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function cvs()
    {
        return $this->hasMany(Cv::class);
    }
}
