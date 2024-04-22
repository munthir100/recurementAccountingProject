<?php

namespace App\Models;

use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Indebtedness extends Model
{
    use HasFactory, HasStatus;

    protected $fillable = [
        'title',
        'description',
        'amount',
        'due_date',
        'type',
        'status_id',
        'account_id',
        'customer_id',
        'worker_id',
        'collateral',
    ];

    const STATUSES = [
        Status::PENDING,
        Status::ACTIVE,
        Status::OVERDUE,
        Status::PAID,
        Status::PARTIALLY_PAID,
        Status::CANCELLED,
        Status::REFUNDED,
        Status::DISPUTED,
        Status::VOID
    ];


    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}
