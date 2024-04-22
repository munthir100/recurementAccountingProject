<?php

namespace App\Models;

use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bond extends Model
{
    use HasFactory, HasStatus;
    protected $fillable = [
        'title',
        'description',
        'amount',
        'interest_rate',
        'maturity_date',
        'issuer',
        'date_of_issue',
        'status_id',
    ];
    const STATUSES = [
        Status::ACTIVE,
        Status::EXPIRED,
        Status::CANCELLED,
        Status::REFUNDED,
        Status::SUSPENDED,
        Status::PREPAID
    ];
}
