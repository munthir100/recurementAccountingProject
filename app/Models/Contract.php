<?php

namespace App\Models;

use App\Filters\ContractFilters;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasStatus;
use Essa\APIToolKit\Filters\Filterable;

class Contract extends Model
{
    use HasFactory, HasStatus, Filterable;

    protected $default_filters = ContractFilters::class;
    
    protected $fillable = [
        'title',
        'description',
        'amount',
        'amount_type',
        'location',
        'renewal_terms',
        'start_date',
        'end_date',
        'status_id',
        'contractable_type',
        'contractable_id',
    ];

    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }

    const STATUSES = [
        Status::ACTIVE => 'Active',
        Status::EXPIRED => 'Expired',
        Status::TERMINATED => 'Terminated',
        Status::RENEWED => 'Renewed',
        Status::CANCELLED => 'Cancelled',
    ];
}
