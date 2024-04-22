<?php

namespace App\Models;

use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory, HasStatus;

    protected $fillable = [
        'description',
        'amount',
        'date',
        'type',
        'status_id',
        'transactionable_type',
        'transactionable_id',
    ];

    const STATUSES = [
        Status::PENDING,
        Status::COMPLETED,
        Status::FAILED,
        Status::CANCELLED,
        Status::REFUNDED,
        Status::REVERSED,
        Status::PROCESSING,
        Status::PARTIALLY_COMPLETED
    ];



    public function transactionable()
    {
        return $this->morphTo();
    }
}
