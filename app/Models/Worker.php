<?php

namespace App\Models;

use App\Traits\HasUploads;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Worker extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['first_name', 'last_name', 'job', 'month_salary', 'contract_period', 'languages', 'nationality', 'age', 'type', 'tall', 'religion', 'place_of_birth', 'children', 'education', 'birth_date', 'weight', 'has_practical_experience', 'practical_experience', 'work_experience_country', 'years_of_experience', 'main_image', 'related_images', 'office_id', 'status_id'];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
