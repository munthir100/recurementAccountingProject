<?php

// app/Models/DeliveryAddress.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'country_id',
        'city',
        'address',
        'longitude',
        'latitude',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
