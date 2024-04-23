<?php

namespace App\Models;

use App\Traits\HasStatus;
use Spatie\MediaLibrary\HasMedia;
use App\Filters\IndebtednessFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Indebtedness extends Model implements HasMedia
{
    use HasFactory, HasStatus, InteractsWithMedia, Filterable;

    protected $default_filters = IndebtednessFilters::class;

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
        Status::PENDING => 'Pending',
        Status::ACTIVE => 'Active',
        Status::OVERDUE => 'Overdue',
        Status::PAID => 'Paid',
        Status::PARTIALLY_PAID => 'Partially Paid',
        Status::CANCELLED => 'Cancelled',
        Status::REFUNDED => 'Refunded',
        Status::DISPUTED => 'Disputed',
        Status::VOID => 'Void',
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
