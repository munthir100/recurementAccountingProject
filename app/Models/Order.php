<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'worker_id',
        'currency',
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

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
