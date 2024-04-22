<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasStatus;

class Discount extends Model
{
    use HasFactory, HasStatus;

    protected $fillable = [
        'title',
        'description',
        'type',
        'amount',
        'due_date',
        'status_id',
        'account_id',
    ];

    const STATUSES = [
        Status::ACTIVE,
        Status::NOT_ACTIVE,
        Status::EXPIRED,
        Status::CANCELLED,
        Status::USED,
        Status::REJECTED,
        Status::SCHEDULED,
        Status::SUSPENDED,
        Status::DEACTIVATED,
        Status::LIMITED_AVAILABILITY,
    ];


    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
