<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    use HasFactory;
    protected $table = 'catagories';

    protected $fillable = [
        'fromtime',
        'totime',
    ];
    // public function dishes()
    // {
    //     return $this->hasMany(Dish::class);
    // }

    // public function getCurrentTimeDishes()
    // {
    //     $currentTime = now()->format('H:i:s');

    //     return $this->dishes()
    //         ->whereRaw("'$currentTime' BETWEEN fromtime AND totime")
    //         ->get();
    // }
}
