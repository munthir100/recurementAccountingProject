<?php

namespace App\Models;

use App\Models\Worker;
use App\Models\Account;
use App\Traits\HasStatus;
use App\Filters\OrderFilters;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, HasStatus;
    protected string $default_filters = OrderFilters::class;
    
    protected $fillable = [
        'customer_id',
        'worker_id',
        'contract_type',
        'contract_start_duration',
        'contract_end_duration',
        'amount',
        'additional_information',
        'status_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Account::class);
    }

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }

}
