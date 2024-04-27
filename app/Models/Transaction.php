<?php

namespace App\Models;

use App\Filters\TransactionFilters;
use App\Models\Status;
use App\Traits\HasStatus;
use App\Models\TransactionType;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory, HasStatus, Filterable;
    protected $default_filters = TransactionFilters::class;

    protected $fillable = [
        'description',
        'amount',
        'date',
        'transaction_type_id',
        'status_id',
        'transactionable_type',
        'transactionable_id',
    ];

    const STATUSES = [
        Status::PENDING => 'Pending',
        Status::COMPLETED => 'Completed',
        Status::FAILED => 'Failed',
        Status::CANCELLED => 'Cancelled',
        Status::REFUNDED => 'Refunded',
        Status::REVERSED => 'Reversed',
        Status::PROCESSING => 'Processing',
        Status::PARTIALLY_COMPLETED => 'Partially Completed',
    ];


    const TRANSACTIONABLE_MODELS = [
        Account::class => 'Account Transaction',
        Order::class => 'Order Transaction',
        Contract::class => 'Contract Transaction',
        Invoice::class => 'Invoice Transaction',
        Bond::class => 'Bond Transaction',
        Discount::class => 'Discount Transaction',
        Indebtedness::class => 'Indebtedness Transaction',
    ];

    public function transactionable()
    {
        return $this->morphTo();
    }

    public function transactionType()
    {
        return $this->belongsTo(TransactionType::class);
    }
}
