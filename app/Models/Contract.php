<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasStatus;

class Contract extends Model
{
    use HasFactory, HasStatus;

    protected $fillable = [
        'title',
        'description',
        'amount',
        'amount_type',
        'location',
        'renewal_terms',
        'start_date',
        'end_date',
        'status_id',
    ];

    const STATUSES = [
        Status::ACTIVE,
        Status::EXPIRED,
        Status::TERMINATED,
        Status::RENEWED,
        Status::CANCELLED
    ];
}
