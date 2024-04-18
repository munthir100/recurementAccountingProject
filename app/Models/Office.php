<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

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
