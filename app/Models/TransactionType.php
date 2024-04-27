<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    use HasFactory;

    const INCOME = 1;
    const EXPENSE = 2;
    const TRANSFER = 3;
    const INVESTMENT = 4;
    const LOAN = 5;
    const DEPOSIT = 6;
    const WITHDRAWAL = 7;

    protected $fillable = ['name'];
}
