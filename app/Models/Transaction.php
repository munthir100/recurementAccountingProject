<?php

namespace App\Models;

use App\Models\Status;
use App\Traits\HasStatus;
use App\Models\TransactionType;
use Spatie\Activitylog\LogOptions;
use App\Filters\TransactionFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory, HasStatus, Filterable, LogsActivity;

    protected $default_filters = TransactionFilters::class;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnlyDirty();
    }

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
        Customer::class => 'Customer Transaction',
        Office::class => 'Office Transaction',
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
