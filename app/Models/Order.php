<?php

namespace App\Models;

use App\Models\Worker;
use App\Models\Account;
use App\Traits\HasStatus;
use App\Filters\OrderFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, HasStatus, Filterable;
    protected string $default_filters = OrderFilters::class;

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
}
