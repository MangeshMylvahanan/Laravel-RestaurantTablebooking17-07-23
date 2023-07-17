<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'order_id',
        'name',
        'address',
        'mobile',
        'email',
        'items',
        'qty',
        'payment_status',
        'delivery_status',
        'payment_for',
    ];
}
