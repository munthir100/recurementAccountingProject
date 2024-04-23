<?php

namespace App\Models;

use App\Filters\InvoiceFilters;
use App\Traits\HasStatus;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory, HasStatus, Filterable;
    protected $default_filters = InvoiceFilters::class;
    
    protected $fillable = [
        'title',
        'description',
        'amount',
        'due_date',
        'type',
        'account_id',
        'billing_address',
        'worker_id',
        'status_id'
    ];

    const STATUSES = [
        Status::PAID => 'Paid',
        Status::OVERDUE => 'Overdue',
        Status::CANCELLED => 'Cancelled',
        Status::REFUNDED => 'Refunded',
        Status::DISPUTED => 'Disputed',
        Status::VOID => 'Void',
        Status::ARCHIVED => 'Archived',
        Status::SCHEDULED => 'Scheduled'
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
