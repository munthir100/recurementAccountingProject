<?php

namespace App\Models;

use App\Models\Office;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cv extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['office_id'];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }
    
}
