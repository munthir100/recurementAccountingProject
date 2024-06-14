<?php

namespace App\Models;

use App\Models\Worker;
use App\Models\Account;
use App\Traits\HasStatus;
use App\Filters\OrderFilters;
use Spatie\Activitylog\LogOptions;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, HasStatus, Filterable, LogsActivity;
    
    protected string $default_filters = OrderFilters::class;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnlyDirty();
    }
    protected $fillable = [
        'account_id',
        'worker_id',
        'contract_type',
        'contract_start_duration',
        'contract_end_duration',
        'amount',
        'additional_information',
        'status_id',
    ];

    const STATUSES = [
        Status::NEW => 'New',
        Status::PENDING => 'Pending',
        Status::PROCESSING => 'Processing',
        Status::DELIVERED => 'Delivered',
        Status::PARTIALLY_COMPLETED => 'Partially Completed',
        Status::COMPLETED => 'Completed',
        Status::FAILED => 'Failed',
        Status::CANCELLED => 'Cancelled'
    ];



    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }

    public function deliveryAddress()
    {
        return $this->hasOne(DeliveryAddress::class);
    }
}
