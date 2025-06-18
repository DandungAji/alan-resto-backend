<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_price',
        'amount_paid',
        'change',
    ];

     public function details(): HasMany
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
