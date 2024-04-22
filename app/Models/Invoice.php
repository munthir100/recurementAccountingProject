<?php

namespace App\Models;

use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory, HasStatus;

    protected $fillable = [
        'title',
        'description',
        'amount',
        'due_date',
        'type',
        'account_id',
        'billing_address',
        'worker_id',
    ];

    const STATUSES = [
        Status::OVERDUE,
        Status::CANCELLED,
        Status::REFUNDED,
        Status::DISPUTED,
        Status::VOID,
        Status::ARCHIVED,
        Status::SCHEDULED
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
