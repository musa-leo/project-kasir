<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'payment',
        'change_money'
    ];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}