<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'ord_id',
        'table_no',
        'table_amount',
        'date',
        'timeslot',
        'name',
        'email',
        'items',
        'quantity',
        'payment_status',
    ];
}
